<?php

namespace App\Filament\Resources\ImportantNumberResource\Pages;

use App\Filament\Resources\ImportantNumberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImportantNumber extends EditRecord
{
    protected static string $resource = ImportantNumberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
