<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $casts = [
    	'id' => 'integer'
    ];
    
    public function employees() {
        return $this->hasMany('App\Models\Employee');
    }
    
    public function appointments() {
        return $this->belongsToMany('App\Models\Appointment');
    }
}
