<?php

namespace App\Filament\Resources\Profile;

use App\Filament\Resources\Profile\MinisterResource\Pages;
use App\Filament\Resources\Profile\MinisterResource\RelationManagers;
use App\Models\Profile\Minister;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MinisterResource extends Resource
{
    protected static ?string $model = Minister::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Menteri';

    protected static ?string $pluralModelLabel = 'Daftar Menteri';

    protected static ?string $navigationLabel = 'Daftar Menteri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('order_number')
                    ->required()
                    ->label('Menteri ke')
                    ->numeric(),
                Forms\Components\DatePicker::make('start_period')
                    ->required(),
                Forms\Components\DatePicker::make('end_period')
                    ->required(),
                Forms\Components\FileUpload::make('photo_path')
                    ->label('Foto')
                    ->image()
                    ->imageEditor()
                    ->directory('ministers')
                    ->visibility('public')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('3:4')
                    ->imageResizeTargetWidth('300')
                    ->imageResizeTargetHeight('400')
                    ->maxSize(5120),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                // Forms\Components\Toggle::make('is_featured')
                //     ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order_number')
                    ->searchable()
                    ->label('Menteri Ke')
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_period')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_period')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('photo_path')
                    ->searchable()
                    ->label('Photo'),
                // Tables\Columns\IconColumn::make('is_featured')
                //     ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
            
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order_number', 'desc');;
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
            'index' => Pages\ListMinisters::route('/'),
            'create' => Pages\CreateMinister::route('/create'),
            'edit' => Pages\EditMinister::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __("Profile");
    }
}
