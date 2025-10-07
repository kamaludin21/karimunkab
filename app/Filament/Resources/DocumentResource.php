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
use Illuminate\Database\Eloquent\Builder;

class DocumentResource extends Resource
{
  protected static ?int $navigationSort = 2;
  protected static ?string $model = Document::class;
  protected static ?string $navigationIcon = 'heroicon-o-document';
  protected static ?string $navigationLabel = 'Publikasi Dokumen';
  protected static ?string $navigationGroup = 'Rilis Informasi';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Select::make('user_id')
          ->label('Author')
          ->relationship('author', 'name')
          ->native(false)
          ->preload()
          ->default(fn() => auth()->user()->hasRole('super_admin') ? null : auth()->id())
          ->required()
          ->disabled(fn() => ! auth()->user()->hasRole('super_admin'))
          ->dehydrated(),
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
          ->helperText('Maksimal 250 Karakter')
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
          ->downloadable()
          ->maxSize(fn() => auth()->user()->hasRole('super_admin') ? 50000 : 5024)
          ->helperText(fn() => auth()->user()->hasRole('super_admin')
            ? 'Maks Size: 50MB'
            : 'Maks Size: 5MB')
          ->required()
          ->getUploadedFileNameForStorageUsing(function ($file, $record, $livewire) {
            $random = \Illuminate\Support\Str::random(4);
            $slug   = \Illuminate\Support\Str::slug($livewire->data['slug'] ?? $record?->slug ?? 'file');
            $ext    = $file->getClientOriginalExtension();

            return "{$slug}-{$random}.{$ext}";
          })
          ->visible(fn($livewire) => filled($livewire->data['slug'] ?? null)),



      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->modifyQueryUsing(function (Builder $query) {
        $user = auth()->user();
        if (! $user->hasRole('super_admin')) {
          $query->where('user_id', $user->id);
        }
      })
      ->columns([
        TextColumn::make('index')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('author.name')
          ->label('Author')
          ->toggleable(),
        TextColumn::make('title')
          ->label('Judul')
          ->wrap()
          ->lineClamp(2),
        TextColumn::make('published_at')
          ->label('Publikasi')
          ->date('d F Y'),
        TextColumn::make('published_at')
          ->label('Publikasi')
          ->date('d F Y')
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
        TextColumn::make('created_at')
          ->label('Dibuat')
          ->date('d F Y')
          ->sortable()
          ->toggleable()
          ->toggleable(isToggledHiddenByDefault: true),
        TextColumn::make('updated_at')
          ->label('Diperbarui')
          ->date('d F Y')
          ->sortable()
          ->toggleable()
          ->toggleable(isToggledHiddenByDefault: true),
      ])
      ->defaultSort('published_at', 'desc')
      ->filters([
        Tables\Filters\SelectFilter::make('author')
          ->relationship('author', 'name')
          ->native(false)
          ->multiple()
          ->preload()
          ->hidden(fn() => ! auth()->user()->hasRole('super_admin')),
      ])
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
      'index' => Pages\ListDocuments::route('/'),
      'create' => Pages\CreateDocument::route('/create'),
      'edit' => Pages\EditDocument::route('/{record}/edit'),
    ];
  }
}
