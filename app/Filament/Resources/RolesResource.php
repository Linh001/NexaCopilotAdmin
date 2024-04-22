<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RolesResource\Pages;
use App\Filament\Resources\RolesResource\RelationManagers;
use App\Models\Roles;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RolesResource extends Resource
{
    protected static ?string $model = Roles::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationGroup = "System Managements";

    protected static ?string $slug = 'v1/roles';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('RoleCode')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('RoleName')
                    ->required()
                    ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('RoleCode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('RoleName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    // ->toggleable(isToggledHiddenByDefault: true)
                    ,
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    // ->toggleable(isToggledHiddenByDefault: true)
                    ,
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRoles::route('/create'),
            'view' => Pages\ViewRoles::route('/{record}'),
            'edit' => Pages\EditRoles::route('/{record}/edit'),
        ];
    }
}
