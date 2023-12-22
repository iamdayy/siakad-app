<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'description',
        'to',
        'level_id',
    ];

    public function level() {
        return $this->belongsTo(Level::class);
    }
}
