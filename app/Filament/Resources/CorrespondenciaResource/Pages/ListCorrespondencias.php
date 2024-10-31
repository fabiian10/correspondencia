<?php

namespace App\Filament\Resources\CorrespondenciaResource\Pages;

use App\Filament\Resources\CorrespondenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCorrespondencias extends ListRecords
{
    protected static string $resource = CorrespondenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
