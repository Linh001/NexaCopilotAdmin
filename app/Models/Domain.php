<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
     protected $fillable = [
        'DomainName','Description'
        // Các trường khác mà bạn muốn cho phép mass assignment cũng được thêm vào đây.
    ];
}
