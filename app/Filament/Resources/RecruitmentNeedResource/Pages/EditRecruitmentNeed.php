<?php

namespace App\Filament\Resources\RecruitmentNeedResource\Pages;

use App\Filament\Resources\RecruitmentNeedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecruitmentNeed extends EditRecord
{
    protected static string $resource = RecruitmentNeedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
