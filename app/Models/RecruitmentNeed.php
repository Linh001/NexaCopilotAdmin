<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentNeed extends Model
{
    use HasFactory;
    protected $fillable =[
        'RecruitmentCode',
        'PositionName',
        'CustomerName',
        'PositionName',
        'JobTitle',
        'Description',
        'Level',
        'Salary',
        'Experience',
        'Application Number',
    ];
}
