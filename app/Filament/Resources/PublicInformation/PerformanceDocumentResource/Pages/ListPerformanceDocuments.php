<?php

namespace App\Filament\Resources\PublicInformation\PerformanceDocumentResource\Pages;

use App\Filament\Resources\PublicInformation\PerformanceDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerformanceDocuments extends ListRecords
{
    protected static string $resource = PerformanceDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}