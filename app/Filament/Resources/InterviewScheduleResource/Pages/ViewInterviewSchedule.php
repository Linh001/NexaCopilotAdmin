<?php

namespace App\Filament\Resources\InterviewScheduleResource\Pages;

use App\Filament\Resources\InterviewScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInterviewSchedule extends ViewRecord
{
    protected static string $resource = InterviewScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
