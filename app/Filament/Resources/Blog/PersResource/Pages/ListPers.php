<?php

namespace App\Filament\Resources\Blog\PersResource\Pages;

use App\Filament\Resources\Blog\PersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPers extends ListRecords
{
    protected static string $resource = PersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
