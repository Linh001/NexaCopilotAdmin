<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = "Employee Managements";

    protected static ?string $slug = 'v1/employees';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                ->schema([
                    Forms\Components\FileUpload::make('Avatar')
                        ->avatar(),
                     Forms\Components\FileUpload::make('ResumeImage')
                            ->image(),
                ])->columns(2),
                Forms\Components\Section::make('')
                  ->schema([
                    
                    Forms\Components\TextInput::make('EmployeeCode')
                        ->required()
                        ->maxLength(20),
                    Forms\Components\TextInput::make('EmployeeName')
                        ->required()
                        ->maxLength(50),
                    Forms\Components\Select::make('Gender')
                        ->required()
                        ->options([
                           'Male' => 'Male',
                           'Female' => 'Female',
                            'Other' => 'Other',
                        ])
                        ->native(false)
                        ->default('Male'),
                    Forms\Components\TextInput::make('Age')
                        ->required()
                        ->numeric(),
                    Forms\Components\DatePicker::make('DateOfBirth')
                        ->native(false)
                        ->displayFormat('d/m/Y')
                        ->required(),
                    Forms\Components\Select::make('EducationLevel')
                        ->required()
                        ->native(false)
                        ->options([
                            'High School Diploma'=>'High School Diploma',
                            'Bachelor Degree'=>'Bachelor Degree',
                            'Master Degree'=>'Master Degree',
                            'Graduate Degree '=>'Graduate Degree',
                            'Vocational Training / Trade School Certification'=>'Vocational Training / Trade School',
                            'Professional Certification'=>'Professional Certificate',
                        ])
                        ->default('Bachelor Degree'),
                    Forms\Components\TextInput::make('Expertise')
                        ->required()
                        ->maxLength(50),
                    Forms\Components\Select::make('Degree')
                        
                        ->required()
                        ->options([
                            'Bachelor of Arts (BA)'=>'Bachelor of Arts',
                            'Bachelor of Science (BS)'=>'Bachelor of Science',
                            'Bachelor of Business Administration (BBA)'=>'Bachelor of Business',
                            'Bachelor of Engineering (BEng)'=>'Bachelor of Engineering',
                            'Bachelor of Fine Arts (BFA)'=>'Bachelor of Fine Arts',
                            'Master of Arts (MA)'=>'Master of Arts',
                            'Master of Science (MS)'=>'Master of Science',
                            'Master of Business Administration (MBA)'=>'Master of Business',
                            'Master of Engineering (MEng)'=>'Master of Engineering',
                            'Master of Fine Arts (MFA)'=>'Master of Fine Arts',
                            'Doctor of Arts (DA)'=>'Doctor of Arts',
                            'Other'=>'Other',
                        ])
                        ->native(false)
                        ->default('Other')
                        ,
                        
                    Forms\Components\Select::make('Status')
                        ->required()
                        ->options([
                            'Open for work'=> 'Open for work',
                            'Hired'=> 'Hired',
                            'Work from home '=> 'Work from home',
                        ])
                        ->native(false)
                        ->default('Open for work'),
                    
                  ])->columns(2),
                     
                Forms\Components\Section::make('Application Information')
                ->description('If this employee is new to system, please ignore this section!')
                ->schema([ 
                    Forms\Components\DatePicker::make('ApplicationHistory')
                        ->native(false)
                        ->disabled(),
                    Forms\Components\DatePicker::make('ApplicationSchedule')
                        ->native(false)
                        ->disabled(),
                    Forms\Components\DateTimePicker::make('LastUpdate')
                        ->native(false)
                        ->nullable()
                        ->disabled(),
                ])->columns(3),
  
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('Avatar')
                    ->circular(),
                Tables\Columns\TextColumn::make('EmployeeCode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('EmployeeName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('EducationLevel')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Expertise')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('LastUpdate')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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



     public static function infolist(Infolist $infolist): Infolist
{
    return $infolist
        ->schema([
            Section::make('')
            ->schema([
                    ImageEntry::make('Avatar')->circular(),
                    ImageEntry::make('ResumeImage'),
                    Section::make('Employee information')
                    ->schema([
                        TextEntry::make('EmployeeCode'),
                        TextEntry::make('EmployeeName'),
                        TextEntry::make('Gender'),
                        TextEntry::make('Age'),
                        TextEntry::make('DateOfBirth'),
                        TextEntry::make('EducationLevel'),
                        TextEntry::make('Expertise'),
                        TextEntry::make('Degree'),
                        TextEntry::make('Status'),
                    ])->columns(2)
                    // TextEntry::make('accountStatus'),
            ])->columns(2),

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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            // 'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
