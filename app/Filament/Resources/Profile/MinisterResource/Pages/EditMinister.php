<?php

namespace App\Filament\Resources\Profile\MinisterResource\Pages;

use App\Filament\Resources\Profile\MinisterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMinister extends EditRecord
{
    protected static string $resource = MinisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
