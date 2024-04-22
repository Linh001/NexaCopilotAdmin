<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
     protected $fillable = [
        'Logo',
        'CustomerCode',
        'CustomerName',
        'CompanyName',
        'CompanyDescription',
        'Email',
        'Address',
        'WorkingHoursStart',
        'WorkingHoursEnd',
        'Website',
        'PhoneNumber',
        'DomainName', 
    ];
}
