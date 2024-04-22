<?php

namespace App\Filament\Resources\InterviewScheduleResource\Pages;

use App\Filament\Resources\InterviewScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInterviewSchedule extends EditRecord
{
    protected static string $resource = InterviewScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
