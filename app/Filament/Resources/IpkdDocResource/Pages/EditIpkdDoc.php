<?php

namespace App\Filament\Resources\IpkdDocResource\Pages;

use App\Filament\Resources\IpkdDocResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIpkdDoc extends EditRecord
{
    protected static string $resource = IpkdDocResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
