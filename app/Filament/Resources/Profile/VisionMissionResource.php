<?php

namespace App\Filament\Resources\Profile;

use App\Filament\Resources\Profile\VisionMissionResource\Pages;
use App\Filament\Resources\Profile\VisionMissionResource\RelationManagers;
use App\Models\Profile\VisionMission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisionMissionResource extends Resource
{
    protected static ?string $model = VisionMission::class;

    protected static ?string $modelLabel = 'Visi dan Misi';

    protected static ?string $pluralModelLabel = 'Visi dan Misi';

    protected static ?string $navigationLabel = 'Visi dan Misi';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('vision')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('mission')
                    ->required()
                    ->columnSpanFull(),
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
            'index' => Pages\ManageVisionMission::route('/'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __("Profile");
    }
}
