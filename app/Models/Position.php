<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'title',
    ];
    
    public function employees() {
        return $this->hasMany('App\Models\Employee');
    }
}
