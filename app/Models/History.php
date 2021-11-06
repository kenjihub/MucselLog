<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    
    protected $fillable = ['user_id','part_id'];
    
    public function detail()
    {
        return $this->hasMany(Detail::class);   
    }
    
    public function part()
    {
        return $this->belongsTo(Part::class); 
    }
}
