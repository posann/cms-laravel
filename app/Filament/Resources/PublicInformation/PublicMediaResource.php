<?php

namespace App\Filament\Resources\PublicInformation;

use App\Filament\Resources\PublicInformation\PublicMediaResource\Pages;
use App\Models\PublicInformation\PublicMedia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PublicMediaResource extends Resource
{
    protected static ?string $model = PublicMedia::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function getNavigationGroup(): ?string
    {
        return __('Informasi Publik');
    }

    public static function getModelLabel(): string
    {
        return __('Media Publik');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Media Publik');
    }

    public static function form(Form $form): Form
    {
        // Mirror News admin form structure
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Post Content')
                            ->description('The main content of your post')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->maxLength(255)
                                    ->placeholder('Enter post title')
                                    ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),

                                Forms\Components\TextInput::make('slug')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(PublicMedia::class, 'slug', ignoreRecord: true)
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
                                                        ->afterStateUpdated(function (string $state, Set $set) {
                                                            $set('new_slug', \Illuminate\Support\Str::slug($state));
                                                        })
                                                        ->unique(PublicMedia::class, 'slug', ignoreRecord: true)
                                                        ->helperText('The slug will be automatically formatted as you type.'),
                                                ])
                                                ->action(function (array $data, Set $set) {
                                                    $set('slug', $data['new_slug']);
                                                });
                                        }
                                        return null;
                                    }),

                                Forms\Components\Textarea::make('content_overview')
                                    ->required()
                                    ->placeholder('Provide a brief summary or excerpt of this post')
                                    ->helperText('This will appear on the listing page')
                                    ->rows(5),

                                Forms\Components\RichEditor::make('content_raw')
                                    ->toolbarButtons([
                                        'attachFiles',
                                        'blockquote',
                                        'bold',
                                        'bulletList',
                                        'h1','h2','h3',
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
                                    ->fileAttachmentsDirectory('public-media/content-uploads')
                                    ->columnSpanFull()
                                    ->maxLength(65535)
                                    ->helperText('Format your content using the toolbar above'),
                            ]),

                        Forms\Components\Section::make('Media')
                            ->description('Visual elements for your post')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\FileUpload::make('image_path')
                                    ->label('Featured Image')
                                    ->directory('public-media/photos')
                                    ->disk('public')
                                    ->preserveFilenames()
                                    ->image()
                                    ->imageResizeMode('contain')
                                    ->imageCropAspectRatio('3:2')
                                    ->imageResizeTargetWidth('1200')
                                    ->imageResizeTargetHeight('800')
                                    ->helperText('Displayed prominently in listings (3:2 ratio recommended)')
                                    ->visible(fn (Get $get) => $get('type') === 'photo')
                                    ->required(fn (Get $get) => $get('type') === 'photo'),

                                Forms\Components\TextInput::make('video_url')
                                    ->label('External Video URL (YouTube,etc..)')
                                    ->helperText('Use embeddable URLs e.g. https://www.youtube.com/embed/... or https://player.vimeo.com/video/...')
                                    ->maxLength(2048)
                                    ->url()
                                    ->visible(fn (Get $get) => $get('type') === 'video')
                                    ->rules(fn (Get $get) => $get('type') === 'video' ? ['nullable','url','required_without:video_file_path'] : ['nullable','url']),

                                Forms\Components\FileUpload::make('video_file_path')
                                    ->label('Video File (MP4/WebM/OGG)')
                                    ->directory('public-media/videos')
                                    ->disk('public')
                                    ->preserveFilenames()
                                    ->acceptedFileTypes(['video/mp4','video/webm','video/ogg'])
                                    ->helperText('Alternatively upload a video file.')
                                    ->visible(fn (Get $get) => $get('type') === 'video')
                                    ->rules(fn (Get $get) => $get('type') === 'video' ? ['nullable','required_without:video_url'] : ['nullable']),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status & Visibility')
                            ->description('Control how this post appears')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->label('Status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'pending' => 'Pending Review',
                                        'published' => 'Published',
                                        'archived' => 'Archived',
                                    ])
                                    ->default('draft')
                                    ->live()
                                    ->required(),

                                Forms\Components\DatePicker::make('published_at')
                                    ->label('Publication Date')
                                    ->placeholder('Select publication date')
                                    ->helperText('Date when the post will be published'),

                                Forms\Components\Select::make('type')
                                    ->label('Category')
                                    ->options([
                                        'photo' => 'Foto',
                                        'video' => 'Video',
                                    ])
                                    ->required()
                                    ->native(false)
                                    ->default('photo')
                                    ->live(),

                                Forms\Components\TagsInput::make('tags')
                                    ->label('Tags')
                                    ->placeholder('Add tags')
                                    ->separator(','),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        // Mirror News admin table structure (simplified for public media)
        return $table
            ->defaultSort('updated_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('type')
                    ->label('Category')
                    ->badge()
                    ->formatStateUsing(fn (string $state) => $state === 'photo' ? 'Foto' : 'Video')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'secondary' => 'draft',
                        'success' => 'published',
                    ])
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last update')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'pending' => 'Pending Review',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ]),
                Tables\Filters\SelectFilter::make('type')
                    ->label('Category')
                    ->options([
                        'photo' => 'Foto',
                        'video' => 'Video',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPublicMedia::route('/'),
            'create' => Pages\CreatePublicMedia::route('/create'),
            'edit' => Pages\EditPublicMedia::route('/{record}/edit'),
        ];
    }
}