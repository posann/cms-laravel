<?php

namespace App\Filament\Resources\PublicInformation\FaqResource\Pages;

use App\Filament\Resources\PublicInformation\FaqResource;
use App\Models\PublicInformation\Faq;
use Filament\Resources\Pages\CreateRecord;

class CreateFaq extends CreateRecord
{
    protected static string $resource = FaqResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $max = Faq::max('order_column');
        $data['order_column'] = is_null($max) ? 1 : ($max + 1);

        return $data;
    }
}