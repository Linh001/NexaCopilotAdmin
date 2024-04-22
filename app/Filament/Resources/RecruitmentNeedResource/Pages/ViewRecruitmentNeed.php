<?php

namespace App\Filament\Resources\RecruitmentNeedResource\Pages;

use App\Filament\Resources\RecruitmentNeedResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRecruitmentNeed extends ViewRecord
{
    protected static string $resource = RecruitmentNeedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
