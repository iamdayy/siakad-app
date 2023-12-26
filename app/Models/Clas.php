<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    use HasFactory;

    public function collagers ()
    {
        return $this->hasMany(Collager::class);
    }

    // public function courses()
    // {
    //     return $this->belongsToMany(Course::class);
    // }
}
