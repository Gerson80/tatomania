<?php

namespace App\Filament\Resources\VivenciaResource\Pages;

use App\Filament\Resources\VivenciaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVivencias extends ListRecords
{
    protected static string $resource = VivenciaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
