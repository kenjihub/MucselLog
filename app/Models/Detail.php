<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = ['history_id','workout_id','weight','reps','comment'];
    
    public function history()
    {
        return $this->belongsTo(History::class);
    }
    
    public function Workout()
    {
        return $this->belongsTo(Workout::class);
    }
}
