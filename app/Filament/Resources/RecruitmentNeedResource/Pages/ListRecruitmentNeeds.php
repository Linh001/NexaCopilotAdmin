<?php

namespace App\Filament\Resources\RecruitmentNeedResource\Pages;

use App\Filament\Resources\RecruitmentNeedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecruitmentNeeds extends ListRecords
{
    protected static string $resource = RecruitmentNeedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
