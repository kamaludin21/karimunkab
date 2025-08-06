<?php

namespace App\Filament\Resources\ImportantNumberResource\Pages;

use App\Filament\Resources\ImportantNumberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImportantNumbers extends ListRecords
{
    protected static string $resource = ImportantNumberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
