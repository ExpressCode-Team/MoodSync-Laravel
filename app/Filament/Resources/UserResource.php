<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->label('User ID')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('spotify_id')
                    ->label('Spotify ID')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('images')
                    ->label('Profile Image URL')
                    ->nullable()
                    ->url(),
                Forms\Components\TextInput::make('external_urls')
                    ->label('External URL')
                    ->nullable()
                    ->url(),
                Forms\Components\TextInput::make('followers')
                    ->label('Number of Followers')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('role')
                    ->label('Role')
                    ->options([
                        0 => 'User',
                        1 => 'Admin',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('country')
                    ->label('Country Code')
                    ->maxLength(10)
                    ->required(),
                Forms\Components\Select::make('product')
                    ->label('Product')
                    ->options([
                        'free' => 'Free',
                        'premium' => 'Premium',
                    ])
                    ->required(),
                Forms\Components\DateTimePicker::make('created_at')
                    ->label('Created At')
                    ->required(),
                Forms\Components\DateTimePicker::make('updated_at')
                    ->label('Updated At')
                    ->required(),
                Forms\Components\DateTimePicker::make('deleted_at')
                    ->label('Deleted At')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('User ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('spotify_id')
                    ->label('Spotify ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email Address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('followers')
                    ->label('Followers')
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('Role')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('country')
                    ->label('Country')
                    ->sortable(),
                Tables\Columns\TextColumn::make('product')
                    ->label('Product')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Deleted At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add related models if needed
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

    public function afterSave()
{
    return redirect()->route('filament.resources.users.index');
}
}