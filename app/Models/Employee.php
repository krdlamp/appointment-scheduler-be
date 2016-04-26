<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'emp_num',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'department_id',
        'position_id',
        'level_id',
    ];

    public function department() {
        return $this->hasOne('App\Models\Department');
    }
    
    public function position() {
        return $this->hasOne('App\Models\Department');
    }
    
    public function level() {
        return $this->hasOne('App\Models\Level');
    }
    
    public function appointments() {
        return $this->belongsToMany('App\Models\Appointment');
    }
}
