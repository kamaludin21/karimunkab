<?php

namespace App\Filament\Resources\IpkdYearResource\Pages;

use App\Filament\Resources\IpkdYearResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIpkdYear extends EditRecord
{
    protected static string $resource = IpkdYearResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
