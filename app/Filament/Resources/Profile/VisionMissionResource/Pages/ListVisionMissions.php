<?php

namespace App\Filament\Resources\Profile\VisionMissionResource\Pages;

use App\Filament\Resources\Profile\VisionMissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisionMissions extends ListRecords
{
    protected static string $resource = VisionMissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
