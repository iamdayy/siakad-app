<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collager extends Model
{
    use HasFactory;

    protected $fillable = [
        'gen_year',
        'study_program_id',
        'phase',
        'status_id',
        'entrance_id',
        'class_id',
        'group_id',
        'enter_date',
        'nim',
        'nik',
        'nisn',
        'full_name',
        'semester',
        'gender',
        'religion',
        'born_place',
        'born_date',
        'address',
        'ward',
        'city',
        'phone',
        'dad_nik',
        'dad_name',
        'mom_nik',
        'mom_name',
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'profileable');
    }
}
