<?php

namespace App\Filament\Resources\Profile\MinisterResource\Pages;

use App\Filament\Resources\Profile\MinisterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMinisters extends ListRecords
{
    protected static string $resource = MinisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
