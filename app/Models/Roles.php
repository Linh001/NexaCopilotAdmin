<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $fillable = [
        'RoleCode','RoleName',
        // Các trường khác mà bạn muốn cho phép mass assignment cũng được thêm vào đây.
    ];
}
