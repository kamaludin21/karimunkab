<?php

namespace App\Filament\Resources\IpkdDocResource\Pages;

use App\Filament\Resources\IpkdDocResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use App\Models\IpkdYear;
use Filament\Tables;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListIpkdDocs extends ListRecords
{
  protected static string $resource = IpkdDocResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\CreateAction::make(),
    ];
  }

  public function getTabs(): array
{
    $years = IpkdYear::orderByDesc('year')->pluck('year', 'id')->toArray();

    $tabs = [];

    // Ambil ID tahun terbesar sebagai default
    $latestYearId = array_key_first($years);

    foreach ($years as $id => $year) {
        $tabs["year_{$year}"] = Tab::make("year_{$year}")
            ->label($year)
            ->modifyQueryUsing(fn($query) => $query->where('ipkd_year_id', $id));
    }

    // Jika hanya ada 1 tahun, langsung tampilkan tanpa kondisi default
    if (count($tabs) === 1) {
        return $tabs;
    }

    // Pastikan tahun terbaru di awal urutan tab
    $tabs = collect($tabs)->sortKeysDesc()->toArray();

    // Kembalikan array tab
    return $tabs;
}

}
