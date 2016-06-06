<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentEmployee extends Model
{
    protected $table = 'appointment_employee';

    protected $fillable = [
        'appointment_id',
        'employee_id',
        'status',
        'notes',
        'reason',
    ];

    public function appointments() {
      return $this->hasMany('App\Models\Appointments');
    }
}
