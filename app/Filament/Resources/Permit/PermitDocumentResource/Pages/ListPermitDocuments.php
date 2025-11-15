<?php

namespace App\Filament\Resources\Permit\PermitDocumentResource\Pages;

use App\Filament\Resources\Permit\PermitDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPermitDocuments extends ListRecords
{
    protected static string $resource = PermitDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}