<?php

namespace App\Filament\Resources\IdentificationOptionResource\Pages;

use App\Filament\Resources\IdentificationOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIdentificationOption extends EditRecord
{
    protected static string $resource = IdentificationOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
