<?php

namespace App\Filament\Resources\Profile\HistoryTimelineResource\Pages;

use App\Filament\Resources\Profile\HistoryTimelineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHistoryTimelines extends ListRecords
{
    protected static string $resource = HistoryTimelineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
