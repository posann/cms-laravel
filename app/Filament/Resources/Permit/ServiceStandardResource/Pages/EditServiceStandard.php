<?php

namespace App\Filament\Resources\Permit\ServiceStandardResource\Pages;

use App\Filament\Resources\Permit\ServiceStandardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Permit\ServiceStandard;

class EditServiceStandard extends EditRecord
{
    protected static string $resource = ServiceStandardResource::class;

    public function mount($record = null): void
    {
        // Ambil record pertama (atau buat kalau belum ada)
        $single = ServiceStandard::first() ?? ServiceStandard::create([]);

        // Paksa Filament membuka record tersebut
        parent::mount($single->getKey());
    }

    // HILANGKAN tombol delete
    protected function getActions(): array
    {
        return [];
    }
}
