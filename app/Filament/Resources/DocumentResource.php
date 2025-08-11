<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
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
use Filament\Forms\Components\RichEditor;

class DocumentResource extends Resource
{
  protected static ?int $navigationSort = 2;
  protected static ?string $model = Document::class;
  protected static ?string $navigationIcon = 'heroicon-o-document';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Select::make('user_id')
          ->label('Author')
          ->disabled((fn(): bool => !auth()->user()->hasRole('super_admin')))
          ->default(auth()->id())
          ->relationship('author', 'name')
          ->searchable()
          ->preload()
          ->required(),
        DatePicker::make('published_at')
          ->label('Tanggal Publikasi')
          ->native(false)
          ->displayFormat('d F Y')
          ->default(today())
          ->required(),
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
        FileUpload::make('file')
          ->label('File')
          ->directory('document/' . now()->format('Y-m'))
          ->maxSize(1024)
          ->downloadable()
          ->helperText('Maks Size: 1MB')
          ->required(),

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
          ->label('Author'),
        TextColumn::make('title')
          ->label('Judul'),
        TextColumn::make('published_at')
          ->label('Publikasi')
          ->date('d F Y')
      ])
      ->defaultSort('published_at', 'desc')
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
      'index' => Pages\ListDocuments::route('/'),
      'create' => Pages\CreateDocument::route('/create'),
      'edit' => Pages\EditDocument::route('/{record}/edit'),
    ];
  }
}
