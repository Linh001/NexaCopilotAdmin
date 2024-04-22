<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecruitmentNeedResource\Pages;
use App\Filament\Resources\RecruitmentNeedResource\RelationManagers;
use App\Models\RecruitmentNeed;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class RecruitmentNeedResource extends Resource
{
    protected static ?string $model = RecruitmentNeed::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Customer Managements";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('RecruitmentCode')
                    ->required(),
                Forms\Components\Select::make('PositionName')
                    ->options(fn(Get $get): Collection => \App\Models\Position::pluck('PositionName', 'PositionName'))
                    ->native(false)
                    ->required(),
                Forms\Components\Select::make('CustomerName')
                            ->options(fn(Get $get): Collection => \App\Models\Customer::pluck('CustomerName', 'CustomerName'))
                            ->native(false)
                            ->required(),
                Forms\Components\TextInput::make('JobTitle')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Textarea::make('Description')
                    ->columnSpanFull(),
                Forms\Components\Select::make('Level')
                    ->required()
                    ->options([
                        'High School Diploma'=>'High School Diploma',
                        'Bachelor Degree'=>'Bachelor Degree',
                        'Master Degree'=>'Master Degree',
                        'Graduate Degree '=>'Graduate Degree',
                        'Vocational Training / Trade School Certification'=>'Vocational Training / Trade School',
                        'Professional Certification'=>'Professional Certificate',
                    ])
                    ->native(false)
                    ->default('Bachelor Degree'),
                Forms\Components\TextInput::make('Salary')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('Experience')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('RecruitmentCode')
                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('PositionName')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CustomerName')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('JobTitle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Level')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Salary')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Experience')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListRecruitmentNeeds::route('/'),
            'create' => Pages\CreateRecruitmentNeed::route('/create'),
            'view' => Pages\ViewRecruitmentNeed::route('/{record}'),
            'edit' => Pages\EditRecruitmentNeed::route('/{record}/edit'),
        ];
    }
}
