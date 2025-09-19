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
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\BulkAction;

class NewsResource extends Resource
{
  protected static ?int $navigationSort = 1;
  protected static ?string $model = News::class;
  protected static ?string $navigationIcon = 'heroicon-o-newspaper';
  protected static ?string $navigationLabel = 'Berita';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Select::make('user_id')
          ->label('Author')
          ->disabled((fn(): bool => !auth()->user()->hasRole('super_admin')))
          ->default(auth()->id())
          ->native(false)
          ->relationship('author', 'name')
          ->preload()
          ->required(),
        DatePicker::make('published_at')
          ->label('Tanggal Publikasi')
          ->native(false)
          ->displayFormat('d F Y')
          ->default(today())
          ->required(),
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
              ->readOnly()
              ->required(),
          ])
          ->required()
          ->label('Kategori Berita'),

        Textarea::make('title')
          ->autosize()
          ->rows(1)
          ->label('Judul')
          ->maxLength(250)
          ->helperText('Maksimal 250 Karakter')
          ->live(onBlur: true)
          ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
          ->required(),
        FileUpload::make('images')
          ->label('Gambar')
          ->image()
          ->directory('news/' . now()->format('Y-m'))
          ->imagePreviewHeight('150')
          ->maxSize(512)
          ->multiple()
          ->maxFiles(5)
          ->helperText('Max File: 5, Size: 500KB')
          ->reorderable()
          ->required(),
        TextInput::make('slug')
          ->label('Slug')
          ->placeholder('Slug')
          ->unique(ignoreRecord: true)
          ->disabled()
          ->dehydrated()
          ->readOnly()
          ->required(),
        RichEditor::make('content')
          ->label('Konten')
          ->maxLength(5000)
          ->disableToolbarButtons([
            'codeBlock',
          ])
          ->required()
          ->columnSpanFull(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('index')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('published_at')
          ->label('Tanggal Publikasi')
          ->date('d F Y')
          ->toggleable(),
        TextColumn::make('title')
          ->label('Judul')
          ->wrap()
          ->lineClamp(2)
          ->searchable(),
        TextColumn::make('author.name')
          ->label('Author')
          ->searchable()
          ->toggleable(isToggledHiddenByDefault: true),
        TextColumn::make('category.title')
          ->label('Kategori')
          ->toggleable(),
      ])
      ->actions([
        Tables\Actions\ActionGroup::make([
          Tables\Actions\EditAction::make(),
          Tables\Actions\DeleteAction::make(),
          Tables\Actions\ForceDeleteAction::make(),
          Tables\Actions\RestoreAction::make(),
        ])
      ])
      ->defaultSort('published_at', 'desc')
      ->filters([
        SelectFilter::make('category')
          ->relationship('category', 'title')
          ->native(false)
          ->preload()
          ->label('Kategori'),
        TrashedFilter::make()
          ->native(false),
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
