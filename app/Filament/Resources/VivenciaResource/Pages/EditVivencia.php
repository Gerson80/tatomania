<?php

namespace App\Filament\Resources\VivenciaResource\Pages;

use App\Filament\Resources\VivenciaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVivencia extends EditRecord
{
    protected static string $resource = VivenciaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
