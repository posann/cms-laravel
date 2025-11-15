<?php

namespace App\Filament\Resources\PublicInformation\PerformanceCategoryResource\Pages;

use App\Filament\Resources\PublicInformation\PerformanceCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerformanceCategories extends ListRecords
{
    protected static string $resource = PerformanceCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}