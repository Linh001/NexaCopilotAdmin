<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'RecruitmentCode',
        'EmployeeName',
        'EmployeeCode',
        'CustomerName',
        'CustomerCode',
        'InterviewTime',
        'Result',
        'Note',


    ];
}
