<?php

namespace App\Filament\Resources\MonthResource\Pages;

use App\Filament\Resources\MonthResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMonths extends ListRecords
{
    protected static string $resource = MonthResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
