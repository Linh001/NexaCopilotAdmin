<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'Avatar',
        'ResumeImage',
    'EmployeeCode',
    'EmployeeName',
    'Gender',
    'Age',
    'DateOfBirth',
    'EducationLevel',
    'Expertise',
    'Degree',
    'Status',
    ];
}
