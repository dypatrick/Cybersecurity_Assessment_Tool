<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id'); //belongs to: local key first then foreign key
    }
}
