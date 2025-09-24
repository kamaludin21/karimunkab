<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Models\Tag;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables;

class TagResource extends Resource
{
  protected static ?string $model = Tag::class;
  protected static ?string $navigationParentItem = 'Berita';
  protected static ?string $navigationLabel = 'Tag';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make('Form Tag')
          ->description('Data tag pada artikel berita')
          ->schema([
            TextInput::make('name')
              ->unique()
              ->label('Suku kata')
              ->helperText('Max: 30 Karakter')
              ->live(onBlur: true)
              ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))->placeholder('Suku kata')->required()->autocomplete(false),
            TextInput::make('slug')->readOnly()->required(),
          ])
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('index')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('name')
          ->forceSearchCaseInsensitive()
          ->label('Tag')
          ->sortable()
          ->searchable(),
        TextColumn::make('created_at')
          ->label('Dibuat')
          ->date()
          ->toggleable()
      ])
      ->actions([
        Tables\Actions\ActionGroup::make([
          Tables\Actions\EditAction::make(),
          Tables\Actions\DeleteAction::make(),
          Tables\Actions\RestoreAction::make(),
        ]),
      ])
      ->emptyStateActions([
        Tables\Actions\CreateAction::make(),
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
      'index' => Pages\ListTags::route('/'),
      'create' => Pages\CreateTag::route('/create'),
      'edit' => Pages\EditTag::route('/{record}/edit'),
    ];
  }
}
