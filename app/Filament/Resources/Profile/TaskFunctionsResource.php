<?php

namespace App\Filament\Resources\Profile;

use App\Filament\Resources\Profile\TaskFunctionsResource\Pages;
use App\Models\Profile\TaskFunctions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class TaskFunctionsResource extends Resource
{
    protected static ?string $model = TaskFunctions::class;

    protected static ?string $modelLabel = 'Tugas dan Fungsi';

    protected static ?string $pluralModelLabel = 'Tugas dan Fungsi';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __("Profile");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\TextInput::make('institution_name')
                            ->label('Nama Instansi')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\RichEditor::make('intro')
                    ->label('Pengantar')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('tugas')
                    ->label('Tugas')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('fungsi')
                    ->label('Fungsi')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('ruang_lingkup')
                    ->label('Ruang Lingkup')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('order_column')
                //     ->label('Urutan')
                //     ->sortable(),
                Tables\Columns\TextColumn::make('institution_name')
                    ->label('Instansi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('intro')
                    ->label('Pengantar')
                    ->formatStateUsing(fn ($state) => Str::of(strip_tags($state)))
                    ->limit(50),
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
            'index' => Pages\ListTaskFunctions::route('/'),
            'create' => Pages\CreateTaskFunctions::route('/create'),
            'edit' => Pages\EditTaskFunctions::route('/{record}/edit'),
        ];
    }
}