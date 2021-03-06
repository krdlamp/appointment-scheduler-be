<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'description',
    ];
    
    public function employees() {
        return $this->hasMany('App\Models\Employee');
    }
}
