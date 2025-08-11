<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PopupResource\Pages;
use App\Filament\Resources\PopupResource\RelationManagers;
use App\Models\Popup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\RichEditor;

class PopupResource extends Resource
{
  protected static ?int $navigationSort = 6;
  protected static ?string $model = Popup::class;
  protected static ?string $navigationIcon = 'heroicon-o-hand-raised';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        TextInput::make('order')
          ->numeric()
          ->hidden()
          ->label('Urutan')
          ->minValue(1),
        Textarea::make('title')
          ->autosize()
          ->rows(1)
          ->label('Judul')
          ->maxLength(250)
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
        FileUpload::make('image')
          ->label('Gambar')
          ->image()
          ->directory('popup/' . now()->format('Y-m'))
          ->imagePreviewHeight('150')
          ->maxSize(2048)
          ->helperText('Max Size: 2MB')
          ->nullable(),
        Toggle::make('is_active')
          ->label('Aktif')
          ->inline(false)
          ->default(true),
        RichEditor::make('description')
          ->label('Konten')
          ->maxLength(5000)
          ->disableToolbarButtons([
            'attachFiles',
            'blockquote',
            'codeBlock',
          ])
          ->nullable()
          ->columnSpanFull(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->reorderable('order')
      ->columns([
        TextColumn::make('order')
          ->label('No.'),
        TextColumn::make('title')
          ->label('Judul')
          ->searchable(),
        ToggleColumn::make('is_active')
          ->label('Status Aktif')
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
      'index' => Pages\ListPopups::route('/'),
      'create' => Pages\CreatePopup::route('/create'),
      'edit' => Pages\EditPopup::route('/{record}/edit'),
    ];
  }
}
