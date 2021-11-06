<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hstry extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    protected $table = 'history';
    
    public function dtls(){
        return $this->hasMany('Dtl');
    }
    
}
