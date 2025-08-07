<?php

namespace App\Filament\Resources\AnnouncementResource\Pages;

use App\Filament\Resources\AnnouncementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;


class CreateAnnouncement extends CreateRecord
{
  protected static string $resource = AnnouncementResource::class;

  protected function mutateFormDataBeforeCreate(array $data): array
  {
    if (!Auth::user()->hasRole('admin')) {
      $data['user_id'] = Auth::id();
    }
    return $data;
  }
}
