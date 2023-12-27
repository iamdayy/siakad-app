<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampussProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_name',
        'app_code',
        'app_title',
        'app_url',
        'no_sk',
        'address',
        'phone',
        'city',
        'mail',
        'rector_nidn',
        'rector_name',
        'logo',
        'favicon',
        'loginBackground',
    ];
}
