<?php

namespace App\Filament\Resources\PublicInformation\PerformanceDocumentResource\Pages;

use App\Filament\Resources\PublicInformation\PerformanceDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerformanceDocument extends EditRecord
{
    protected static string $resource = PerformanceDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}