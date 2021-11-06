<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    
    protected $fillable = ['name','part_id'];
    
    public function part()
    {
        return $this->belongsTo(Part::class);
    }
    
    public function detail()
    {
        return $this->hasMany(Detail::class); 
    }
}
