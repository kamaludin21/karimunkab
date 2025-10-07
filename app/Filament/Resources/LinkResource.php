<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinkResource\Pages;
use App\Models\Link;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;

class LinkResource extends Resource
{

  protected static ?int $navigationSort = 5;
  protected static ?string $model = Link::class;
  protected static ?string $navigationIcon = 'heroicon-o-arrow-up-right';
  protected static ?string $navigationLabel = 'Tautan';
  protected static ?string $navigationGroup = 'Rilis Informasi';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Grid::make(2)->schema([
          Select::make('link_category_id')
            ->relationship(name: 'category', titleAttribute: 'title')
            ->native(false)
            ->createOptionForm([
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
            ])
            ->required()
            ->label('Kategori Berita'),
          Textarea::make('url')
            ->autosize()
            ->rows(1)
            ->label('URL')
            ->maxLength(250)
            ->required(),
          TextInput::make('order')
            ->numeric()
            ->hidden()
            ->label('Urutan')
            ->minValue(1),
          Textarea::make('description')
            ->autosize()
            ->rows(1)
            ->label('Deskripsi')
            ->maxLength(250)
            ->required(),
          Toggle::make('is_external')
            ->label('Arahkan ke Tab Baru?')
            ->inline(false)
            ->default(true),
          FileUpload::make('thumbnail')
            ->label('Thumbnail')
            ->image()
            ->directory('thumbnails')
            ->imagePreviewHeight('150')
            ->maxSize(128)
            ->nullable(),
        ]),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->reorderable('order')
      ->columns([
        TextColumn::make('order')
          ->label('No.'),
        ImageColumn::make('thumbnail')
          ->label('Thumbnail')
          ->searchable(),
        TextColumn::make('description')
          ->label('Keterangan')
          ->searchable(),
        TextColumn::make('url')
          ->label('Alamat URL')
          ->searchable(),
        TextColumn::make('category.title')
          ->label('Kategory')
          ->searchable(),
      ])
      ->defaultSort('order', 'asc')
      ->actions([
        Tables\Actions\ActionGroup::make([
          Tables\Actions\EditAction::make(),
          Tables\Actions\DeleteAction::make(),
        ])
      ])
      ->filters([
        SelectFilter::make('category')
          ->relationship('category', 'title')
          ->native()
          ->label('Kategori')
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
      'index' => Pages\ListLinks::route('/'),
      'create' => Pages\CreateLink::route('/create'),
      'edit' => Pages\EditLink::route('/{record}/edit'),
    ];
  }
}
