<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnouncementResource\Pages;
use App\Filament\Resources\AnnouncementResource\RelationManagers;
use App\Models\Announcement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;

class AnnouncementResource extends Resource
{
  protected static ?int $navigationSort = 3;
  protected static ?string $model = Announcement::class;
  protected static ?string $navigationIcon = 'heroicon-o-megaphone';
  protected static ?string $navigationLabel = 'Pengumuman';


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
          ->default(today()),
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
        FileUpload::make('thumbnail')
          ->label('Gambar Cover')
          ->directory('announcement/cover/' . now()->format('Y-m'))
          ->imagePreviewHeight('150')
          ->image()
          ->maxSize(512)
          ->reorderable()
          ->nullable(),
        FileUpload::make('files')
          ->label('File Pendukung')
          ->directory('announcement/files/' . now()->format('Y-m'))
          ->imagePreviewHeight('150')
          ->downloadable()
          ->maxSize(1024)
          ->multiple()
          ->maxFiles(5)
          ->reorderable()
          ->nullable(),
        RichEditor::make('content')
          ->label('Konten')
          ->maxLength(5000)
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
        TextColumn::make('author.name')
          ->label('Author'),
        TextColumn::make('title')
          ->label('Judul')
          ->searchable()
          ->wrap(),
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
      'index' => Pages\ListAnnouncements::route('/'),
      'create' => Pages\CreateAnnouncement::route('/create'),
      'edit' => Pages\EditAnnouncement::route('/{record}/edit'),
    ];
  }
}
