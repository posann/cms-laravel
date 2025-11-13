<?php

namespace App\Filament\Resources\Blog\PersResource\Pages;

use App\Filament\Resources\Blog\PersResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePers extends CreateRecord
{
    protected static string $resource = PersResource::class;

    protected function afterCreate(): void
    {
        if ($this->record->status === \App\Enums\Blog\PostStatus::PENDING) {
            $users = \App\Models\User::permission('approve_pers::pers')->get();
            foreach ($users as $user) {
                \Filament\Notifications\Notification::make()
                    ->title('Post submitted for approval')
                    ->body('The post "' . $this->record->title . '" has been submitted for approval.')
                    ->info()
                    ->sendToDatabase($user);
            }
        }
    }
}
