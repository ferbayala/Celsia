<?php

namespace App\Filament\Resources\ServiceOptionResource\Pages;

use App\Filament\Resources\ServiceOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServiceOption extends EditRecord
{
    protected static string $resource = ServiceOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
