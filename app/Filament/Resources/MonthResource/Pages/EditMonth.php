<?php

namespace App\Filament\Resources\MonthResource\Pages;

use App\Filament\Resources\MonthResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMonth extends EditRecord
{
    protected static string $resource = MonthResource::class;
    
    protected function getRedirectUrl():string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getActions(): array
    {
        
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
