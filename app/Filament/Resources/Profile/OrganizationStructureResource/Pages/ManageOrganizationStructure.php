<?php

namespace App\Filament\Resources\Profile\OrganizationStructureResource\Pages;

use App\Filament\Resources\Profile\OrganizationStructureResource;
use App\Models\Profile\OrganizationStructure;
use Filament\Actions;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\DB;

class ManageOrganizationStructure extends Page
{
    protected static string $resource = OrganizationStructureResource::class;

    protected static ?string $title = "Struktur Organisasi";
    protected static string $view = 'filament.resources.profile.organization-structure-resource.pages.manage-organization-structure';
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $organizationStructure = OrganizationStructure::first();
        
        if ($organizationStructure) {
            $this->form->fill($organizationStructure->toArray());
        } else {
            $this->form->fill([]);
        }
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('description')
                    ->label('Deskripsi')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\FileUpload::make('image_path')
                    ->label('Gambar Struktur Organisasi')
                    ->image()
                    ->imageEditor()
                    ->directory('organization-structures')
                    ->visibility('public')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1200')
                    ->imageResizeTargetHeight('675')
                    ->maxSize(5120),
            ])
            ->statePath('data')
            ->model(OrganizationStructure::class);
    }
    
    public function save(): void
    {
        $data = $this->form->getState();
        
        DB::transaction(function () use ($data) {
            $organizationStructure = OrganizationStructure::first();
            
            if ($organizationStructure) {
                $organizationStructure->update($data);
            } else {
                OrganizationStructure::create($data);
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