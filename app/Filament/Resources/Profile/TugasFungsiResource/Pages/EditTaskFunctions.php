<?php

namespace App\Filament\Resources\Profile\TaskFunctionsResource\Pages;

use App\Filament\Resources\Profile\TaskFunctionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTaskFunctions extends EditRecord
{
    protected static string $resource = TaskFunctionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}