<?php

namespace App\Filament\Resources\CorrespondenciaResource\Pages;

use App\Filament\Resources\CorrespondenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCorrespondencia extends EditRecord
{
    protected static string $resource = CorrespondenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
