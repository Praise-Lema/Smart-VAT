<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
    
    protected function getRedirectUrl():string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Action::make('send receipt')
            ->label('Send Receipt')
            ->url('/receipt/'.$this->record->id.'/mail'),
        ];
    }
}
