<?php

namespace App\Filament\Resources\Price;

use App\Filament\Resources\Price\PriceResource\Pages;
use App\Filament\Resources\Price\PriceResource\RelationManagers;
use App\Models\Price\Price;
use App\Models\Price\PriceSubMenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PriceResource extends Resource
{
    protected static ?string $model = Price::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?int $navigationSort = -3;

    protected static ?string $navigationLabel = 'Harga Acuan';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('price_menu_id')
                ->label('Kategori Harga Acuan')
                ->relationship('menu', 'name')
                ->searchable()
                ->preload()
                ->required()
                ->createOptionForm([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Kategori')
                        ->required()
                        ->maxLength(200),
                ]),

            Forms\Components\Select::make('sub_name_id')
                ->label('Sub Kategori Harga')
                ->options(function (callable $get) {
                    $menuId = $get('price_menu_id');
                    if (!$menuId) {
                        return [];
                    }

                    return PriceSubMenu::where('price_menu_id', $menuId)
                        ->pluck('sub_name', 'id');
                })
                ->searchable()
                ->required()
                ->reactive()
                ->createOptionForm([
                    Forms\Components\TextInput::make('sub_name')
                        ->label('Nama Sub Kategori')
                        ->required()
                        ->maxLength(200),

                    Forms\Components\Toggle::make('status')
                        ->label('Status')
                        ->default(true),
                ])
                ->createOptionUsing(function (array $data, callable $get) {
                    // pastikan price_menu_id yang dipilih ikut disimpan
                    return PriceSubMenu::create([
                        'sub_name'      => $data['sub_name'],
                        'status'        => $data['status'] ?? true,
                        'price_menu_id' => $get('price_menu_id'),
                    ])->id;
                }),

            Forms\Components\DatePicker::make('date_period')
                ->label('Periode Tanggal')
                ->required(),

            Forms\Components\TextInput::make('price')
                ->label('Harga')
                ->numeric()
                ->prefix('USD/dmt')
                ->required()
                ->rule('numeric')
                ->helperText('Masukkan harga dalam angka'),
        ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('menu.name')
                    ->label('Kategori Harga')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('subMenu.sub_name')
                    ->label('Sub Kategori Harga')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->money('usd', true)
                    ->sortable(),

                Tables\Columns\TextColumn::make('date_period')
                    ->label('Periode')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrices::route('/'),
            'create' => Pages\CreatePrice::route('/create'),
            'edit' => Pages\EditPrice::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __("Harga Acuan");
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'gray';
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->title;
    }
}
