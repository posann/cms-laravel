<?php

namespace App\Filament\Resources\PublicInformation;

use App\Filament\Resources\PublicInformation\PerformanceDocumentResource\Pages;
use App\Models\PublicInformation\PerformanceDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PerformanceDocumentResource extends Resource
{
    protected static ?string $model = PerformanceDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';

    public static function getNavigationGroup(): ?string
    {
        return __('Kinerja');
    }

    public static function getModelLabel(): string
    {
        return __('Dokumen Kinerja');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Dokumen Kinerja');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('performance_category_id')
                            ->relationship('category', 'name')
                            ->label('Kategori')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->seconds(false),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('file_path')
                            ->label('File PDF')
                            ->helperText('Opsional: unggah file PDF. Jika mengisi tautan eksternal, pengunduhan akan diarahkan ke tautan tersebut.')
                            ->directory('performance')
                            ->disk('public')
                            ->preserveFilenames()
                            ->acceptedFileTypes(['application/pdf'])
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('external_url')
                            ->label('Tautan PDF Eksternal')
                            ->helperText('Opsional: masukkan URL PDF. Jika terisi, ini diprioritaskan sebagai sumber unduhan.')
                            ->maxLength(2048)
                            ->url()
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),

                        Forms\Components\TextInput::make('download_count')
                            ->label('Jumlah Unduhan')
                            ->numeric()
                            ->default(0)
                            ->disabled(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Dipublikasikan')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('download_count')
                    ->label('Unduhan')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\IconColumn::make('file_path')
                    ->label('File')
                    ->boolean()
                    ->trueIcon('heroicon-o-check')
                    ->falseIcon('heroicon-o-x-mark'),

                Tables\Columns\IconColumn::make('external_url')
                    ->label('Link')
                    ->boolean()
                    ->trueIcon('heroicon-o-link')
                    ->falseIcon('heroicon-o-x-mark'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('performance_category_id')
                    ->relationship('category', 'name')
                    ->label('Kategori'),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif')
                    ->boolean(),

                Tables\Filters\SelectFilter::make('year')
                    ->label('Tahun')
                    ->options(function () {
                        return PerformanceDocument::query()
                            ->whereNotNull('published_at')
                            ->selectRaw('DISTINCT YEAR(published_at) as y')
                            ->orderByDesc('y')
                            ->pluck('y', 'y')
                            ->toArray();
                    })
                    ->query(function ($query, $data) {
                        if (!empty($data['value'])) {
                            $query->whereYear('published_at', (int) $data['value']);
                        }
                    }),
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
            'index' => Pages\ListPerformanceDocuments::route('/'),
            'create' => Pages\CreatePerformanceDocument::route('/create'),
            'edit' => Pages\EditPerformanceDocument::route('/{record}/edit'),
        ];
    }
}