<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'set_date',
        'start_time',
        'end_time',
        'purpose',
        'status',
    ];

    public function employees() {
        return $this->belongsToMany('App\Models\Employee');
    }
    
    public function departments() {
        return $this->belongsToMany('App\Models\Department');
    }
    
    public function agendas() {
        return $this->hasMany('App\Models\Agenda');
    }
}
