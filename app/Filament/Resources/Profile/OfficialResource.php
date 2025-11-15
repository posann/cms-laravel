<?php

namespace App\Filament\Resources\Profile;

use App\Filament\Resources\Profile\OfficialResource\Pages;
use App\Filament\Resources\Profile\OfficialResource\RelationManagers;
use App\Models\Profile\Official;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OfficialResource extends Resource
{
    protected static ?string $model = Official::class;

    protected static ?string $modelLabel = 'Pejabat';

    protected static ?string $pluralModelLabel = 'Daftar Pejabat';

    protected static ?string $navigationLabel = 'Daftar Pejabat';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('position')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('position_type')
                    ->required()
                    ->options([
                        'Menteri' => 'Menteri',
                        'Wakil Menteri' => 'Wakil Menteri',
                        'Pejabat' => 'Pejabat',
                    ]),
                Forms\Components\DatePicker::make('start_period')
                    ->required(),
                Forms\Components\DatePicker::make('end_period')
                    ->required(),
                Forms\Components\FileUpload::make('photo_path')
                    ->label('Foto')
                    ->image()
                    ->imageEditor()
                    ->directory('officials')
                    ->visibility('public')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('3:4')
                    ->imageResizeTargetWidth('300')
                    ->imageResizeTargetHeight('400')
                    ->maxSize(5120),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_period')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_period')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('photo_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOfficials::route('/'),
            'create' => Pages\CreateOfficial::route('/create'),
            'edit' => Pages\EditOfficial::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __("Profile");
    }
}
