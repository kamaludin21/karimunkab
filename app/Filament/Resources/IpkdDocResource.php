<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IpkdDocResource\Pages;
use App\Filament\Resources\IpkdDocResource\RelationManagers;
use App\Models\IpkdDoc;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;


class IpkdDocResource extends Resource
{
  protected static ?string $model = IpkdDoc::class;

  protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
  protected static ?string $navigationLabel = 'IPKD';
  protected static ?string $modelLabel = 'IPKD';
  protected static ?string $navigationGroup = 'IPKD';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Select::make('ipkd_year_id')
          ->label('Tahun')
          ->relationship(
            name: 'year',
            titleAttribute: 'year',
            modifyQueryUsing: fn($query) =>
            $query->orderBy('year', 'desc')
          )
          ->required()
          ->native(false)
          ->helperText('Pilih tahun IPKD'),
        DatePicker::make('published_at')
          ->label('Tanggal Publikasi')
          ->native(false)
          ->displayFormat('d F Y')
          ->required(),
        DatePicker::make('determined_at')
          ->label('Tanggal Penetapan')
          ->native(false)
          ->displayFormat('d F Y')
          ->required(),
        Textarea::make('title')
          ->autosize()
          ->rows(1)
          ->label('Judul Dokumen')
          ->maxLength(250)
          ->helperText('Maksimal 250 Karakter')
          ->live(onBlur: true)
          ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
          ->required(),
        TextInput::make('slug')
          ->label('Slug')
          ->placeholder('Slug')
          ->unique(ignoreRecord: true)
          ->disabled()
          ->dehydrated()
          ->readOnly()
          ->required(),
        FileUpload::make('file')
          ->label('File')
          ->directory('document/' . now()->format('Y'))
          ->downloadable()
          ->maxSize(fn() => auth()->user()->hasRole('super_admin') ? 50000 : 5024)
          ->helperText(fn() => auth()->user()->hasRole('super_admin')
            ? 'Maks Size: 50MB'
            : 'Maks Size: 5MB')
          ->required()
          ->getUploadedFileNameForStorageUsing(function ($file, $record, $livewire) {
            $slug   = \Illuminate\Support\Str::slug($livewire->data['slug'] ?? $record?->slug ?? 'file');
            $ext    = $file->getClientOriginalExtension();
            return "{$slug}.{$ext}";
          })
          ->visible(fn($livewire) => filled($livewire->data['slug'] ?? null)),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->reorderable('order_in_year')
      ->columns([
        TextColumn::make('index')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('order_in_year')
          ->label('Urutan')
          ->alignCenter(),
        TextColumn::make('year.year')
          ->label('Tahun')
          ->sortable(),
        TextColumn::make('title')
          ->label('Judul')
          ->wrap()
          ->lineClamp(2),
        TextColumn::make('published_at')
          ->date('d F Y')
          ->label('Publikasi'),
        TextColumn::make('determined_at')
          ->date('d F Y')
          ->label('Penetapan'),
      ])
      ->defaultSort('published_at', 'desc')
      ->actions([
        Tables\Actions\ActionGroup::make([
          Tables\Actions\EditAction::make(),
          Tables\Actions\DeleteAction::make(),
        ]),
      ]);
  }

  public static function getRelations(): array
  {
    return [
      //
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListIpkdDocs::route('/'),
      'create' => Pages\CreateIpkdDoc::route('/create'),
      'edit' => Pages\EditIpkdDoc::route('/{record}/edit'),
    ];
  }
}
