<?php

namespace App\Filament\Resources\Profile\ContactLocationResource\Pages;

use App\Filament\Resources\Profile\ContactLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactLocation extends EditRecord
{
    protected static string $resource = ContactLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
