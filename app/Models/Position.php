<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'title',
    ];

    protected $casts = [
    	'id' => 'integer'
    ];
    
    public function employees() {
        return $this->hasMany('App\Models\Employee');
    }
}
