<?php

namespace App\Filament\Resources\Profile;

use App\Filament\Resources\Profile\LogoMeaningResource\Pages;
use App\Filament\Resources\Profile\LogoMeaningResource\RelationManagers;
use App\Models\Profile\LogoMeaning;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LogoMeaningResource extends Resource
{
    protected static ?string $model = LogoMeaning::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Kelola Makna Logo';

    protected static ?string $pluralModelLabel = 'Kelola Makna Logo';

    protected static ?string $navigationLabel = 'Kelola Makna Logo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('meanings')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('logo_path')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ]);
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
            'index' => Pages\ManageLogoMeaning::route('/'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __("Profile");
    }
}
