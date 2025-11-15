<?php

namespace App\Filament\Resources\Permit\PermitDocumentResource\Pages;

use App\Filament\Resources\Permit\PermitDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermitDocument extends EditRecord
{
    protected static string $resource = PermitDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}