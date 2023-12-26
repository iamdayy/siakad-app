<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title'
    ];

    public function collagers ()
    {
        return $this->hasMany(Collager::class);
    }

    // public function courses()
    // {
    //     return $this->belongsToMany(Course::class);
    // }
}
