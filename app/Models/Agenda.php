<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'description',
        'appointment_id',
    ];

    protected $casts = [
    	'id'			 => 'integer',
    	'appointment_id' => 'integer'
    ];

    public function appointment() {
        return $this->belongsTo('App\Models\Appointment');
    }
}
