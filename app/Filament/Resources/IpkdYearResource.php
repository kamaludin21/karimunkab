<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IpkdYearResource\Pages;
use App\Filament\Resources\IpkdYearResource\RelationManagers;
use App\Models\IpkdYear;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;


class IpkdYearResource extends Resource
{
  protected static ?string $model = IpkdYear::class;

  protected static ?string $navigationIcon = 'heroicon-o-calendar';
  protected static ?string $navigationLabel = 'Tahun IPKD';
  protected static ?string $modelLabel = 'Tahun IPKD';
  protected static ?string $navigationGroup = 'IPKD';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        TextInput::make('year')
          ->label('Tahun')
          ->numeric()
          ->inputMode('decimal')
          ->maxLength(4)
          ->minLength(4)
          ->unique(ignoreRecord: true)
          ->required(),
        Toggle::make('is_active')
          ->label('Aktif')
          ->inline(false)
          ->required()
          ->helperText('Muncul pada halaman depan'),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('index')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('year')
          ->label('Tahun'),
        ToggleColumn::make('is_active')->label('Muncul pada halaman depan?'),
      ])
      ->defaultSort('year', 'desc')
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
      'index' => Pages\ListIpkdYears::route('/'),
      // 'create' => Pages\CreateIpkdYear::route('/create'),
      // 'edit' => Pages\EditIpkdYear::route('/{record}/edit'),
    ];
  }
}
