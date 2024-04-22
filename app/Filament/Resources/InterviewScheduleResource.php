<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InterviewScheduleResource\Pages;
use App\Filament\Resources\InterviewScheduleResource\RelationManagers;
use App\Models\InterviewSchedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class InterviewScheduleResource extends Resource
{
    protected static ?string $model = InterviewSchedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = "Customer Managements";
    protected static ?string $slug = 'v1/interview-schedules';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                ->schema([
                    Forms\Components\Select::make('RecruitmentCode')
                    ->options(fn(Get $get): Collection => \App\Models\RecruitmentNeed::pluck('RecruitmentCode', 'RecruitmentCode'))
                    ->searchable()
                    ->required(),
                    Forms\Components\Select::make('EmployeeCode')
                    ->options(fn(Get $get): Collection => \App\Models\Employee::pluck('EmployeeCode', 'EmployeeCode'))
                    ->searchable()
                    ->required(),
                    Forms\Components\Select::make('CustomerCode')
                        ->options(fn(Get $get): Collection => \App\Models\Customer::pluck('CustomerCode', 'CustomerCode'))
                        ->searchable()
                        ->required(),
                    
                    Forms\Components\DateTimePicker::make('InterviewTime')
                        ->displayFormat('d/m/Y H:i')
                        ->native(false)
                        ->required(),
                    Forms\Components\Select::make('Result')
                    ->options([
                        'REQUESTING' => 'Requesting',
                        'APPOINTMENT'=>'Appointment',
                        'WAITING_FOR_JUDGMENT'=>'Waiting for result',
                        'ACCEPTED'=>'Accepted',
                        'REJECTED'=>'Rejected',
                        
                    ])    
                    ->native(false)
                    ->default('Requesting')
                    ->required(),
                    Forms\Components\Textarea::make('Note')
                        ->columnSpanFull(),

                    ])->columns(2)                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('RecruitmentCode')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('EmployeeCode')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CustomerCode')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('InterviewTime')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Result')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'REQUESTING' => 'gray',
                        'APPOINTMENT' => 'warning',
                        'WAITING_FOR_JUDGMENT'=>'info',
                        'ACCEPTED' => 'success',
                        'REJECTED' => 'danger',
                    }),
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
            'index' => Pages\ListInterviewSchedules::route('/'),
            'create' => Pages\CreateInterviewSchedule::route('/create'),
            'view' => Pages\ViewInterviewSchedule::route('/{record}'),
            'edit' => Pages\EditInterviewSchedule::route('/{record}/edit'),
        ];
    }
}
