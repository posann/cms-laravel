<?php

namespace App\Filament\Resources\Profile\LogoMeaningResource\Pages;

use App\Filament\Resources\Profile\LogoMeaningResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLogoMeanings extends ListRecords
{
    protected static string $resource = LogoMeaningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
