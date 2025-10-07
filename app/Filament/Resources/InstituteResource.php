<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstituteResource\Pages;
use App\Filament\Resources\InstituteResource\RelationManagers;
use App\Models\Institute;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{Textarea, TextInput, Toggle};
use Filament\Tables\Columns\{TextColumn, IconColumn};
use Filament\Forms\Set;
use Illuminate\Support\Str;

class InstituteResource extends Resource
{
  protected static ?string $model = Institute::class;

  protected static ?string $navigationIcon = 'heroicon-o-building-library';
  protected static ?string $navigationLabel = 'Institusi/Lembaga';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Textarea::make('name')
          ->autosize()
          ->rows(1)
          ->label('Nama Institusi')
          ->helperText('Maks: 300 Karakter')
          ->maxLength(300)
          ->live(onBlur: true)
          ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
          ->required(),
        TextInput::make('slug')
          ->label('Slug')
          ->placeholder('Slug')
          ->helperText('Maks: 320 Karakter')
          ->maxLength(320)
          ->unique(ignoreRecord: true)
          ->disabled()
          ->dehydrated()
          ->readOnly()
          ->required(),
        Textarea::make('alias')
          ->autosize()
          ->rows(1)
          ->label('Alias/Akronim')
          ->helperText('Maks: 50 Karakter')
          ->maxLength(50),
        TextInput::make('code')
          ->label('Kode Instansi')
          ->helperText('Maks: 50 Karakter')
          ->required()
          ->maxLength(50),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('index')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('code')
          ->label('Kode'),
        TextColumn::make('name')
          ->label('Nama'),
        TextColumn::make('alias')
          ->label('Alias'),
      ])
      ->filters([
        //
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
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
      'index' => Pages\ListInstitutes::route('/'),
      // 'create' => Pages\CreateInstitute::route('/create'),
      // 'edit' => Pages\EditInstitute::route('/{record}/edit'),
    ];
  }
}
