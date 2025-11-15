<?php

namespace App\Filament\Resources\Profile\TaskFunctionsResource\Pages;

use App\Filament\Resources\Profile\TaskFunctionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTaskFunctions extends ListRecords
{
    protected static string $resource = TaskFunctionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}