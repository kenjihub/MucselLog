<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    
    protected $fillable = ['name'];
    
    public function workouts()
    {
        return $this->hasMany(Workout::class);
    }
    
     public function histories()
    {
        return $this->hasMany(History::class);
    }
}

