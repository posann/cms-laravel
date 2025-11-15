<?php

namespace App\Filament\Resources\Profile\VisionMissionResource\Pages;

use App\Filament\Resources\Profile\VisionMissionResource;
use App\Models\Profile\VisionMission;
use Filament\Actions;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\DB;

class ManageVisionMission extends Page
{
    protected static string $resource = VisionMissionResource::class;

    protected static ?string $title = "Visi & Misi";
    protected static string $view = 'filament.resources.profile.vision-mission-resource.pages.manage-vision-mission';
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $visionMission = VisionMission::first();
        
        if ($visionMission) {
            $this->form->fill($visionMission->toArray());
        } else {
            $this->form->fill([]);
        }
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('vision')
                    ->required()
                    ->columnSpanFull()
                    ->label('Visi'),
                Forms\Components\Textarea::make('mission')
                    ->required()
                    ->columnSpanFull()
                    ->label('Misi'),
            ])
            ->statePath('data')
            ->model(VisionMission::class);
    }
    
    public function save(): void
    {
        $data = $this->form->getState();
        
        DB::transaction(function () use ($data) {
            $visionMission = VisionMission::first();
            
            if ($visionMission) {
                $visionMission->update($data);
            } else {
                VisionMission::create($data);
            }
        });
        
        $this->redirect(static::getUrl());
    }
    
    protected function getFormActions(): array
    {
        return [
            Actions\Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->action('save'),
        ];
    }
}