<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function parent() {
        return $this->belongsTo(Route::class, 'parent_id');
    }
    public function childerns() {
        return $this->hasMany(Route::class, 'parent_id');
    }
}
