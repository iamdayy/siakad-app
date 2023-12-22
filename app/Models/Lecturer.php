<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'nidn',
        'full_name',
        'gender',
        'born_place',
        'born_date',
        'address',
        'city',
        'phone',
        'study_program_id',
        'status_id',
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'profileable');
    }
}
