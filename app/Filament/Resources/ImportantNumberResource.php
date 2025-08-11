<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImportantNumberResource\Pages;
use App\Filament\Resources\ImportantNumberResource\RelationManagers;
use App\Models\ImportantNumber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{TextInput, Toggle};
use Filament\Tables\Columns\{TextColumn, IconColumn};

class ImportantNumberResource extends Resource
{

  protected static ?int $navigationSort = 4;
  protected static ?string $model = ImportantNumber::class;
  protected static ?string $navigationIcon = 'heroicon-o-phone';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        TextInput::make('order')
          ->numeric()
          ->hidden()
          ->label('Urutan')
          ->minValue(1),
        TextInput::make('service_name')
          ->label('Nama Layanan')
          ->required(),
        TextInput::make('contact_name')
          ->label('Nama Kontak')
          ->required(),
        TextInput::make('phone_number')
          ->label('Nomor Telpon')
          ->type('tel')
          ->inputMode('tel')
          ->required()
          ->minLength(9)
          ->maxLength(16)
          ->helperText('Awali dengan: 628xxx')
          ->rule('regex:/^[0-9]+$/')
          ->placeholder('+6281234567890'),
        Toggle::make('is_whatsapp')
          ->label('Aktif Whatsapp?')
          ->inline(false)
          ->default(true),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->reorderable('order')
      ->columns([
        TextColumn::make('order')
          ->label('No.'),
        TextColumn::make('service_name')
          ->label('Layanan')
          ->searchable(),
        TextColumn::make('contact_name')
          ->label('PIC')
          ->searchable(),
        TextColumn::make('phone_number')
          ->label('Nomor Telp.')
          ->searchable(),
        IconColumn::make('is_whatsapp')
          ->label('Aktif Whatsapp?')
          ->boolean(),
      ])
      ->defaultSort('order', 'asc')
      ->actions([
        Tables\Actions\ActionGroup::make([
          Tables\Actions\EditAction::make(),
          Tables\Actions\DeleteAction::make(),
        ])
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
      'index' => Pages\ListImportantNumbers::route('/'),
      'create' => Pages\CreateImportantNumber::route('/create'),
      'edit' => Pages\EditImportantNumber::route('/{record}/edit'),
    ];
  }
}
