<?php

namespace App\Filament\Resources\PublicInformation\PublicMediaResource\Pages;

use App\Filament\Resources\PublicInformation\PublicMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPublicMedia extends ListRecords
{
    protected static string $resource = PublicMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}