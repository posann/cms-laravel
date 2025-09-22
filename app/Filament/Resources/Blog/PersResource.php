<?php

namespace App\Filament\Resources\Blog;

use App\Enums\Blog\PostStatus;
use App\Filament\Resources\Blog\PersResource\Pages;
use App\Filament\Resources\Blog\PersResource\RelationManagers;
use App\Models\Blog\Pers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
// use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Filament\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Facades\Auth;

class PersResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Pers::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?string $recordTitleAttribute = 'title';

    protected static ?int $navigationSort = -3;

    protected static ?string $navigationLabel = 'Siaran Pers';

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
            'force_delete',
            'force_delete_any',
            'restore',
            'restore_any',
            'replicate',
            'reorder',
            'publish',
            'archive',
            'feature',
            'change_author',
            'approve',
            'schedule',
            'manage_seo',
            'bulk_publish',
            'view_analytics'
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Post Content')
                ->description('The main content of your blog post')
                ->icon('heroicon-o-document-text')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->maxLength(255)
                        ->placeholder('Enter post title')
                        ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                    Forms\Components\TextInput::make('slug')
                        ->disabled()
                        ->dehydrated()
                        ->required()
                        ->maxLength(255)
                        ->unique(Pers::class, 'slug', ignoreRecord: true)
                        ->helperText('URL-friendly version of the title - generated automatically')
                        ->suffixAction(function (string $operation) {
                            if ($operation === 'edit') {
                                return Forms\Components\Actions\Action::make('editSlug')
                                    ->icon('heroicon-o-pencil-square')
                                    ->modalHeading('Edit Slug')
                                    ->modalDescription('Customize the URL slug for this post. Use lowercase letters, numbers, and hyphens only.')
                                    ->modalIcon('heroicon-o-link')
                                    ->modalSubmitActionLabel('Update Slug')
                                    ->form([
                                        Forms\Components\TextInput::make('new_slug')
                                            ->hiddenLabel()
                                            ->required()
                                            ->maxLength(255)
                                            ->live(debounce: 500)
                                            ->afterStateUpdated(function (string $state, Forms\Set $set) {
                                                $set('new_slug', Str::slug($state));
                                            })
                                            ->unique(Pers::class, 'slug', ignoreRecord: true)
                                            ->helperText('The slug will be automatically formatted as you type.')
                                    ])
                                    ->action(function (array $data, Forms\Set $set) {
                                        $set('slug', $data['new_slug']);

                                        Notification::make()
                                            ->title('Slug updated')
                                            ->success()
                                            ->send();
                                    });
                            }
                            return null;
                        }),

                    Forms\Components\Textarea::make('content_overview')
                        ->required()
                        ->placeholder('Provide a brief summary or excerpt of this post')
                        ->helperText('This will appear on the blog listing page')
                        ->rows(5),

                    Forms\Components\RichEditor::make('content_raw')
                        ->toolbarButtons([
                            'attachFiles',
                            'blockquote',
                            'bold',
                            'bulletList',
                            'codeBlock',
                            'h1',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ])
                        ->required()
                        ->placeholder('Write your post content here...')
                        ->fileAttachmentsDisk('public')
                        ->fileAttachmentsDirectory('blog/pers/content-uploads')
                        ->columnSpanFull()
                        ->maxLength(65535)
                        ->helperText('Format your content using the toolbar above')
                        ->hint(function (Get $get): string {
                            $wordCount = str_word_count(strip_tags($get('content_raw')));
                            $readingTime = ceil($wordCount / 200); // Assuming 200 words per minute
                            return "{$wordCount} words | ~{$readingTime} min read";
                        })
                        ->extraInputAttributes(['style' => 'min-height: 500px;']),
                ]),
                Forms\Components\Section::make('Media')
                ->description('Visual elements for your post')
                ->icon('heroicon-o-photo')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('featured')
                        ->label('Featured Image')
                        ->collection('featured')
                        ->image()
                        ->imageResizeMode('contain')
                        ->imageCropAspectRatio('16:9')
                        ->imageResizeTargetWidth('1200')
                        ->imageResizeTargetHeight('675')
                        ->helperText('This image will be displayed prominently in post listings and social shares (16:9 ratio recommended)')
                        ->downloadable()
                        ->responsiveImages(),
                ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status & Visibility')
                            ->description('Control how this post appears')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->options(function (?Pers $record) {
                                        $user = Auth::user();
                                        $currentStatus = $record?->status;

                                        $allowedStatuses = [];

                                        if ($user && $user->isSuperAdmin()) {
                                            $allowedStatuses = PostStatus::class;
                                        } elseif ($user && $user->hasAnyRole(['admin', 'editor'])) {
                                            $allowedStatuses = PostStatus::class;
                                        } elseif ($user && $user->hasRole('author')) {
                                            $allowedStatuses = [
                                                PostStatus::DRAFT->value => PostStatus::DRAFT->getLabel(),
                                                PostStatus::PENDING->value => PostStatus::PENDING->getLabel(),
                                            ];

                                            if ($currentStatus === PostStatus::PUBLISHED) {
                                                $allowedStatuses[PostStatus::PUBLISHED->value] = PostStatus::PUBLISHED->getLabel();
                                            }
                                        }

                                        return $allowedStatuses;
                                    })
                                    ->default(PostStatus::DRAFT->value)
                                    ->live()
                                    ->required()
                                    ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                        if ($state === PostStatus::PUBLISHED->value && !$get('published_at')) {
                                            $set('published_at', now());
                                        } elseif ($state === PostStatus::DRAFT->value) {
                                            $set('published_at', null);
                                            $set('scheduled_at', null);
                                        }
                                    })
                                    ->helperText(function () {
                                        $user = Auth::user();
                                        if ($user && $user->hasRole('author')) {
                                            return 'Authors can create drafts or submit for review. Only editors can publish.';
                                        }
                                        return 'Control the publication status of this post.';
                                    }),

                                Forms\Components\DatePicker::make('published_at')
                                    ->label('Publication Date')
                                    ->required(fn(Get $get): bool => $get('status') === PostStatus::PUBLISHED->value)
                                    ->placeholder('Select publication date')
                                    ->helperText('Date when the post will be published')
                                    ->default(now())
                                    ->disabled(function () {
                                        $user = Auth::user();
                                        return $user && $user->hasRole('author');
                                    }),

                                Forms\Components\DateTimePicker::make('scheduled_at')
                                    ->label('Schedule For')
                                    ->required(fn(Get $get): bool => $get('status') === PostStatus::PENDING->value)
                                    ->visible(fn(Get $get): bool => $get('status') === PostStatus::PENDING->value)
                                    ->placeholder('Select scheduled date')
                                    ->seconds(false)
                                    ->timezone('UTC')
                                    ->hint('Post will be automatically published at this time')
                                    ->hintIcon('heroicon-m-clock')
                                    ->disabled(function (?Pers $record) {
                                        $user = Auth::user();
                                        return $user && $user->hasRole('author') && !$user->can('schedule', $record ?? new Pers());
                                    }),

                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured Post')
                                    ->helperText('Featured posts appear prominently on the site')
                                    ->default(false)
                                    ->visible(function (?Pers $record) {
                                        $user = Auth::user();
                                        return $user && $user->can('feature', $record ?? new Pers());
                                    })
                                    ->disabled(function (?Pers $record) {
                                        $user = Auth::user();
                                        return !$user || !$user->can('feature', $record ?? new Pers());
                                    }),

                                Forms\Components\Placeholder::make('analytics')
                                    ->label('Post Analytics')
                                    ->content(function (?Pers $record): HtmlString {
                                        if (!$record) {
                                            return new HtmlString('<span class="text-sm text-gray-500">Analytics will be available after saving</span>');
                                        }

                                        return new HtmlString("
                                            <div class='space-y-2'>
                                                <div class='flex justify-between'>
                                                    <span class='text-sm text-gray-600'>Views:</span>
                                                    <span class='text-sm font-semibold'>{$record->view_count}</span>
                                                </div>
                                                <div class='flex justify-between'>
                                                    <span class='text-sm text-gray-600'>Reading Time:</span>
                                                    <span class='text-sm font-semibold'>{$record->reading_time} min</span>
                                                </div>
                                                <div class='flex justify-between'>
                                                    <span class='text-sm text-gray-600'>Comments:</span>
                                                    <span class='text-sm font-semibold'>{$record->comments_count}</span>
                                                </div>
                                            </div>
                                        ");
                                    })
                                    ->visible(function (?Pers $record) {
                                        $user = Auth::user();
                                        return $record && $user && $user->can('viewAnalytics', $record);
                                    }),
                            ])
                            ->columnSpan(['lg' => 1]),

                        Forms\Components\Section::make('Categorization')
                            ->description('Organize and classify this post')
                            ->icon('heroicon-o-tag')
                            ->schema([
                                SpatieTagsInput::make('tags')
                                    ->label('Tags')
                                    ->placeholder('Add tags')
                                    ->helperText('Comma-separated tags to help with search and filtering'),
                            ])->columnSpan(['lg' => 1]),

                        Forms\Components\Section::make('Attribution')
                            ->description('Who created this post')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Forms\Components\Select::make('blog_author_id')
                                    ->label('Author')
                                    ->relationship(
                                        name: 'author',
                                        modifyQueryUsing: fn(Builder $query) => $query->with('roles')->whereRelation('roles', 'name', '=', 'author'),
                                    )
                                    ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->firstname} {$record->lastname}")
                                    ->searchable(['firstname', 'lastname'])
                                    ->preload()
                                    ->required()
                                    ->disabled(function (?Pers $record) {
                                        $user = Auth::user();
                                        if (!$user) return true;

                                        if ($user->isSuperAdmin()) {
                                            return false;
                                        }

                                        if (!$record) {
                                            return !$user->can('change_author_blog::pers');
                                        }

                                        return !$user->can('changeAuthor', $record);
                                    })
                                    ->helperText(function (?Pers $record) {
                                        $user = Auth::user();
                                        if (!$user) return '';

                                        if ($user->isSuperAdmin()) {
                                            return 'Super Admin can change any post author.';
                                        }

                                        if (!$user->can('change_author_blog::pers')) {
                                            return 'Only administrators can change the post author.';
                                        }
                                        return 'Select the author for this post.';
                                    }),

                                Forms\Components\Placeholder::make('audit_trail')
                                    ->label('')
                                    ->content(function (Pers $record): HtmlString {
                                        if ($record->exists) {
                                            $creatorName = $record->creator ? "{$record->creator->firstname} {$record->creator->lastname}" : 'Unknown';
                                            $updaterName = $record->updater ? "{$record->updater->firstname} {$record->updater->lastname}" : 'Unknown';
                                            $createdAt = $record->created_at?->format('M d, Y \a\t h:ia');
                                            $updatedAt = $record->updated_at?->diffForHumans();

                                            return new HtmlString("
                                                <div class='space-y-4'>
                                                    <div>
                                                        <div class='text-sm font-medium text-gray-400 dark:text-gray-400'>Created by</div>
                                                        <div class='flex items-center space-x-2'>
                                                            <span class='text-sm font-bold text-primary-600 dark:text-primary-400'>{$creatorName}</span>
                                                            <span class='text-xs text-gray-500 dark:text-gray-400'>on {$createdAt}</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class='text-sm font-medium text-gray-400 dark:text-gray-400'>Last updated by</div>
                                                        <div class='flex items-center space-x-2'>
                                                            <span class='text-sm font-bold text-primary-600 dark:text-primary-400'>{$updaterName}</span>
                                                            <span class='text-xs text-gray-500 dark:text-gray-400'>{$updatedAt}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            ");
                                        }

                                        return new HtmlString("<span class='text-sm text-gray-500 dark:text-gray-400'>Audit information will be available after saving</span>");
                                    })
                                    ->visible(fn(string $operation): bool => $operation === 'edit'),
                            ])
                            ->visible(function (?Pers $record) {
                                return Auth::user()->can('change_author', $record);
                            })->columnSpan(['lg' => 1]),

                        Forms\Components\Section::make('SEO')
                            ->description('Search Engine Optimization')
                            ->icon('heroicon-o-magnifying-glass')
                            ->collapsed()
                            ->visible(function (?Pers $record) {
                                $user = Auth::user();
                                return $user && $user->can('manageSeo', $record ?? new Pers());
                            })
                            ->schema([
                                Forms\Components\Textarea::make('meta_title')
                                    ->placeholder('Leave empty to use post title')
                                    ->maxLength(70)
                                    ->helperText('Recommended: 50-60 characters')
                                    ->rows(2),

                                Forms\Components\Textarea::make('meta_description')
                                    ->placeholder('Leave empty to use post overview')
                                    ->maxLength(160)
                                    ->helperText('Recommended: 150-160 characters')
                                    ->rows(5),

                                Forms\Components\Section::make()
                                    ->schema([
                                        Forms\Components\Placeholder::make('seo_preview')
                                            ->label('Google Preview')
                                            ->content(function (Get $get): HtmlString {
                                                $title = $get('meta_title') ?: $get('title');
                                                $description = $get('meta_description') ?: $get('content_overview');
                                                $url = config('app.url') . '/blog/' . ($get('slug') ?: Str::slug($get('title')));

                                                return new HtmlString("
                                                    <div class='text-base font-medium text-primary-600'>{$title}</div>
                                                    <div class='text-xs text-emerald-600'>{$url}</div>
                                                    <div class='mt-1 text-sm text-gray-600'>{$description}</div>
                                                ");
                                            }),
                                    ])
                                    ->compact(),

                                Forms\Components\Actions::make([
                                    Forms\Components\Actions\Action::make('generateSeoMetadata')
                                        ->label('Generate SEO Metadata')
                                        ->icon('heroicon-m-sparkles')
                                        ->action(function (Get $get, Set $set) {
                                            $title = $get('title');
                                            $overview = $get('content_overview');

                                            // Generate meta title (up to 60 chars)
                                            $set('meta_title', Str::limit($title, 60));

                                            // Generate meta description (up to 155 chars)
                                            if ($overview) {
                                                $set('meta_description', Str::limit($overview, 155));
                                            }

                                            Notification::make()
                                                ->title('SEO metadata generated')
                                                ->success()
                                                ->send();
                                        }),

                                    Forms\Components\Actions\Action::make('previewPost')
                                        ->label('Preview Post')
                                        ->icon('heroicon-m-eye')
                                        ->color('info')
                                        ->action(function (Get $get) {
                                            $previewUrl = route('blog.preview', [
                                                'title' => $get('title'),
                                                'content' => $get('content_raw'),
                                                'excerpt' => $get('content_overview'),
                                                'meta_description' => $get('meta_description') ?: $get('content_overview'),
                                                'slug' => $get('slug'),
                                                'featured_image' => '', // You can add featured image URL logic here
                                            ]);

                                            return redirect()->to($previewUrl);
                                        })
                                        ->openUrlInNewTab()
                                        ->visible(fn (Get $get): bool => !empty($get('title')) && !empty($get('content_raw'))),
                                ])->columnSpanFull(),
                            ])->columnSpan(['lg' => 1]),
                    ])
                    ->columns(2)->columnSpan(['lg' => 1]),
            ])->columns(1);;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $user = Auth::user();

                // Authors can only see their own posts
                if ($user && $user->hasRole('author')) {
                    $query->where(function ($q) use ($user) {
                        $q->where('blog_author_id', $user->id)
                          ->orWhere('created_by', $user->id);
                    });
                }

                return $query;
            })
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->visible(function () {
                        $user = Auth::user();
                        return $user && $user->hasAnyRole(['super_admin', 'admin', 'editor']);
                    }),

                Tables\Columns\TextColumn::make('author.firstname')
                    ->label('Author')
                    ->formatStateUsing(fn(Model $record) => "{$record->author->firstname} {$record->author->lastname}")
                    ->searchable(['firstname', 'lastname'])
                    ->sortable(),                
                Tables\Columns\TextColumn::make('status')->badge(),
                Tables\Columns\TextColumn::make('reading_time')
                    ->label('Reading')
                    ->suffix(' min')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('view_count')
                    ->label('Views')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->visible(function () {
                        $user = auth()->user();
                        return $user->can('view_analytics_blog::post');
                    }),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last update')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('meta_title')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('meta_description')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('locale')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('view_count')
                //     ->numeric()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('comments_count')
                //     ->numeric()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('reading_time')
                //     ->numeric()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('created_by')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('updated_by')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('deleted_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = Auth::user();

        // Authors can only see their own posts
        if ($user && $user->hasRole('author')) {
            $query->where(function ($q) use ($user) {
                $q->where('blog_author_id', $user->id)
                  ->orWhere('created_by', $user->id);
            });
        }

        return $query;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPers::route('/'),
            'create' => Pages\CreatePers::route('/create'),
            'edit' => Pages\EditPers::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __("menu.nav_group.blog");
    }

    public static function getNavigationBadge(): ?string
    {
        $user = Auth::user();

        if ($user && $user->hasRole('author')) {
            // Authors see count of their own posts
            return (string) static::getModel()::where('blog_author_id', $user->id)
                ->orWhere('created_by', $user->id)
                ->count();
        }

        return (string) static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'gray';
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->title;
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Category' => $record->category->name,
            'Author' => "{$record->author->firstname} {$record->author->lastname}",
            'Status' => $record->status->getLabel(),
        ];
    }
}
