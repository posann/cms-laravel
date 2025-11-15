<?php

namespace App\Filament\Resources\Permit\PermitCategoryResource\Pages;

use App\Filament\Resources\Permit\PermitCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermitCategory extends EditRecord
{
    protected static string $resource = PermitCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}