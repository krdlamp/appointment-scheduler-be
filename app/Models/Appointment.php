<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'subject',
        'set_date',
        'start_time',
        'end_time',
        'purpose',
        'status',
        'employee_id',
        'venue',
        'notes',
        'reason',
    ];

    public function employees() {
        return $this->belongsToMany('App\Models\Employee')->withPivot('status');
    }

    public function employee() {
        return $this->belongsTo('App\Models\Employee');
    }

    public function departments() {
        return $this->belongsToMany('App\Models\Department');
    }

    public function agendas() {
        return $this->hasMany('App\Models\Agenda');
    }
}
