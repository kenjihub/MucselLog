<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtl extends Model
{
    use HasFactory;
    
    protected $table = 'details';
    
    public function hstry(){
        return $this->belongsTo('Hstry','history_id');
    }
    
}
