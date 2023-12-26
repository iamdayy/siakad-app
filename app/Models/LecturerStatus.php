<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title'
    ];
}
