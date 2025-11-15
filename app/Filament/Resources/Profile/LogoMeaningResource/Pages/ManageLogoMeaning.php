<?php

namespace App\Filament\Resources\Profile\LogoMeaningResource\Pages;

use App\Filament\Resources\Profile\LogoMeaningResource;
use App\Models\Profile\LogoMeaning;
use Filament\Actions;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\DB;

class ManageLogoMeaning extends Page
{
    protected static string $resource = LogoMeaningResource::class;

    protected static ?string $title = "Maknal Logo";
    protected static string $view = 'filament.resources.profile.logo-meaning-resource.pages.manage-logo-meaning';
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $logoMeaning = LogoMeaning::first();
        
        if ($logoMeaning) {
            $this->form->fill($logoMeaning->toArray());
        } else {
            $this->form->fill([]);
        }
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->label('Keterangan'),
                Forms\Components\RichEditor::make('meanings')
                    ->required()
                    ->columnSpanFull()
                    ->label('Makna Logo'),
                Forms\Components\FileUpload::make('logo_path')
                    ->label('Logo')
                    ->image()
                    ->imageEditor()
                    ->directory('logo-meanings')
                    ->visibility('public')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('500')
                    ->imageResizeTargetHeight('500')
                    ->maxSize(5120)
                    ->required(),
            ])
            ->statePath('data')
            ->model(LogoMeaning::class);
    }
    
    public function save(): void
    {
        $data = $this->form->getState();
        
        DB::transaction(function () use ($data) {
            $logoMeaning = LogoMeaning::first();
            
            if ($logoMeaning) {
                $logoMeaning->update($data);
            } else {
                LogoMeaning::create($data);
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