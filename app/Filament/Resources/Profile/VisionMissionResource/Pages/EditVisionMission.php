<?php

namespace App\Filament\Resources\Profile\VisionMissionResource\Pages;

use App\Filament\Resources\Profile\VisionMissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisionMission extends EditRecord
{
    protected static string $resource = VisionMissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
