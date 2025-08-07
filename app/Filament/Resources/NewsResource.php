<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
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
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;


class NewsResource extends Resource
{
  protected static ?int $navigationSort = 1;
  protected static ?string $model = News::class;
  protected static ?string $navigationIcon = 'heroicon-o-newspaper';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Select::make('news_category_id')
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
              ->readOnly(),
          ])
          ->required()
          ->label('Kategori Tautan'),
        DatePicker::make('published_at')
          ->label('Tanggal Publikasi')
          ->native(false),
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
          ->readOnly(),
        RichEditor::make('content')
          ->label('Konten')
          ->maxLength(5000)
          ->required(),
        FileUpload::make('images')
          ->label('Gambar')
          ->image()
          ->directory('news/' . now()->format('Y-m'))
          ->imagePreviewHeight('150')
          ->maxSize(512)
          ->multiple()
          ->maxFiles(5)
          ->reorderable()
          ->nullable(),

      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('index')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('author.name')
          ->label('Author')
          ->searchable(),
        TextColumn::make('title')
          ->label('Judul')
          ->searchable(),
        TextColumn::make('category.title')
          ->label('Kategori'),
        TextColumn::make('published_at')
          ->label('Publikasi')
          ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->translatedFormat('d F Y')),
      ])
      ->actions([
        Tables\Actions\ActionGroup::make([
          Tables\Actions\EditAction::make(),
          Tables\Actions\DeleteAction::make(),
        ])
      ])
      ->defaultSort('published_at', 'desc')
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
      'index' => Pages\ListNews::route('/'),
      'create' => Pages\CreateNews::route('/create'),
      'edit' => Pages\EditNews::route('/{record}/edit'),
    ];
  }
}
