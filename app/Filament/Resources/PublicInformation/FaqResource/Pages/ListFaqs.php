<?php

namespace App\Filament\Resources\PublicInformation\FaqResource\Pages;

use App\Filament\Resources\PublicInformation\FaqResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaqs extends ListRecords
{
    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}