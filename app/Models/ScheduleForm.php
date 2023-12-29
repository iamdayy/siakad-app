<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'start',
        'end',
        'status',
    ];
}
