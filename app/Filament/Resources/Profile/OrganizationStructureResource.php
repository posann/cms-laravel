<?php

namespace App\Filament\Resources\Profile;

use App\Filament\Resources\Profile\OrganizationStructureResource\Pages;
use App\Filament\Resources\Profile\OrganizationStructureResource\RelationManagers;
use App\Models\Profile\OrganizationStructure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganizationStructureResource extends Resource
{
    protected static ?string $model = OrganizationStructure::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Kelola Struktur Organisasi';

    protected static ?string $pluralModelLabel = 'Kelola Struktur Organisasi';

    protected static ?string $navigationLabel = 'Kelola Struktur Organisasi';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\FileUpload::make('image_path')
                    ->image(),
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
            'index' => Pages\ManageOrganizationStructure::route('/'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __("Profile");
    }
}
