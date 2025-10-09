<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Institute;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;

class UserResource extends Resource
{
  protected static ?int $navigationSort = 2;
  protected static ?string $model = User::class;
  protected static ?string $navigationIcon = 'heroicon-o-user-group';
  protected static ?string $navigationGroup = 'User Management';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Select::make('institute_id')
          ->label('Institusi')
          ->options(Institute::all()->pluck('name', 'id'))
          ->searchable()
          ->preload()
          ->native(false),
        TextInput::make('name')
          ->label('Nama')
          ->required(),
        TextInput::make('email')
          ->label('Email')
          ->email()
          ->required()
          ->maxLength(255),
        TextInput::make('password')
          ->label('Password')
          ->hiddenOn('edit')
          ->required()
          ->password()
          ->revealable(),
        Select::make('roles')
          ->relationship('roles', 'name')
          ->multiple()
          ->preload()
          ->native(false)
          ->required(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('order')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('institute.alias')
          ->label('Institusi')
          ->searchable(),
        TextColumn::make('name')
          ->label('Nama')
          ->searchable(),
        TextColumn::make('email')
          ->label('Email')
          ->copyable()
          ->searchable(),
        TextColumn::make('roles.name')
          ->label('Roles')
          ->badge(),
      ])
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
      'index' => Pages\ListUsers::route('/'),
      'create' => Pages\CreateUser::route('/create'),
      'edit' => Pages\EditUser::route('/{record}/edit'),
    ];
  }
}
