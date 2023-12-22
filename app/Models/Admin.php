<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'full_name',
        'gender',
        'born_place',
        'born_date',
        'address',
        'city',
        'phone'
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'profileable');
    }
}
