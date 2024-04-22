<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = "Customer Managements";

    protected static ?string $slug = 'v1/customers';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Forms\Components\Section::make('')
                    ->schema([
                        
                        Forms\Components\TextInput::make('CustomerCode')
                        ->required()
                        ->maxLength(20),
                        Forms\Components\FileUpload::make('Logo')
                        ->image(),
                        Forms\Components\TextInput::make('CustomerName')
                        ->required()
                        ->maxLength(50),
                    Forms\Components\TextInput::make('CompanyName')
                        ->required()
                        ->maxLength(100),
                
                    Forms\Components\TextInput::make('Email')
                        ->required()
                        ->maxLength(100),
                    Forms\Components\TextInput::make('Address')
                        ->required()
                        ->maxLength(255),
                    ])->columns(2),
                    Forms\Components\Section::make('')
                    ->schema([
                        Forms\Components\TimePicker::make('WorkingHoursStart'),
                            
                        Forms\Components\TimePicker::make('WorkingHoursEnd'),
                            
                        Forms\Components\TextInput::make('Website')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('PhoneNumber')
                            ->required()
                            ->maxLength(20),
                    ])->columns(2),
                    Forms\Components\Section::make('')
                        ->schema([
                        Forms\Components\Select::make('DomainName')
                            ->options(fn(Get $get): Collection => \App\Models\Domain::pluck('DomainName', 'DomainName'))
                            ->required(),
                        Forms\Components\Textarea::make('CompanyDescription')
                        ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('Logo')
                ->circular(),
                Tables\Columns\TextColumn::make('CustomerCode')
                ->searchable(),
                Tables\Columns\TextColumn::make('CompanyName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('WorkingHoursStart')
                    ->label('Working Hours Start')
                    ->searchable(),
                Tables\Columns\TextColumn::make('WorkingHoursEnd')
                    ->label('Working Hours End')
                    ->searchable(),
                Tables\Columns\TextColumn::make('DomainName')
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'view' => Pages\ViewCustomer::route('/{record}'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
