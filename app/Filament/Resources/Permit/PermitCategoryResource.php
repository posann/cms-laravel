<?php

namespace App\Filament\Resources\Permit;

use App\Filament\Resources\Permit\PermitCategoryResource\Pages;
use App\Models\Permit\PermitCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PermitCategoryResource extends Resource
{
    protected static ?string $model = PermitCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    public static function getNavigationGroup(): ?string
    {
        return __("Permit");
    }

    public static function getModelLabel(): string
    {
        return __('Kategori Perizinan');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Kategori Perizinan');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Kategori')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('order_column')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),

                    ])->columns(2),
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_column')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif')
                    ->boolean(),
            ])
            ->actions([
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
            'index' => Pages\ListPermitCategories::route('/'),
            'create' => Pages\CreatePermitCategory::route('/create'),
            'edit' => Pages\EditPermitCategory::route('/{record}/edit'),
        ];
    }
}