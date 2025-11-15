<?php

namespace App\Filament\Resources\Permit;

use App\Filament\Resources\Permit\ServiceStandardResource\Pages;
use App\Models\Permit\ServiceStandard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;

class ServiceStandardResource extends Resource
{
    protected static ?string $model = ServiceStandard::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function getNavigationGroup(): ?string
    {
        return __("Permit");
    }

    public static function getModelLabel(): string
    {
        return __('Standar Layanan');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Standar Layanan');
    }
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Judul')
                ->required(),

            Forms\Components\Textarea::make('description')
                ->label('Keterangan')
                ->rows(4),

            Forms\Components\FileUpload::make('pdf_path')
                ->label('File PDF')
                ->disk('public')
                ->directory('service_standard')
                ->visibility('public')
                ->acceptedFileTypes(['application/pdf']),
        ]);
    }

    public static function getPages(): array
    {
        return [
            // Gunakan key 'index' agar Filament dapat membuat item navigasi default.
            'index' => Pages\EditServiceStandard::route('/'),
        ];
    }
}
