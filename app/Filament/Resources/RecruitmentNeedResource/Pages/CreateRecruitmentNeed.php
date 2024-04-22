<?php

namespace App\Filament\Resources\RecruitmentNeedResource\Pages;

use App\Filament\Resources\RecruitmentNeedResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRecruitmentNeed extends CreateRecord
{
    protected static string $resource = RecruitmentNeedResource::class;
     public function checkMatch($recruitmentNeedId)
    {
        $recruitmentNeed = \App\Models\RecruitmentNeed::findOrFail($recruitmentNeedId);

        // Tìm tất cả nhân viên phù hợp với nhu cầu tuyển dụng
        $matchedEmployees = \App\Models\Employee::where('position', $recruitmentNeed->PositionName)
            ->where('level', $recruitmentNeed->Level)
            ->get();

        if ($matchedEmployees->isNotEmpty()) {
            // Hiển thị thông báo với các nhân viên phù hợp
            foreach ($matchedEmployees as $employee) {
                $this->notify("Có nhân viên phù hợp: {$employee->EmployeeName} - {$employee->position} - Level: {$employee->level}");
            }
        } else {
            $this->notify("Không có nhân viên nào phù hợp với nhu cầu tuyển dụng này.");
        }
 
        return redirect()->route('filament.resources.recruitment-needs.index');
    }

}
