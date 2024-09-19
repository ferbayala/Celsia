<?php

namespace App\Filament\Resources\ServiceOptionResource\Pages;

use App\Filament\Resources\ServiceOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceOptions extends ListRecords
{
    protected static string $resource = ServiceOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
