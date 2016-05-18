<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Employee extends Model implements AuthenticatableContract,
                                        AuthorizableContract,
                                        CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'employees';

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

    protected $hidden = ['password', 'remember_token'];

    public function account() {
      return $this->hasOne('App\Models\Account');
    }

    public function department() {
        return $this->belongsTo('App\Models\Department');
    }

    public function position() {
        return $this->belongsTo('App\Models\Position');
    }

    public function level() {
        return $this->belongsTo('App\Models\Level');
    }

    public function set_appointments() {
        return $this->hasMany('App\Models\Appointment');
    }

    public function appointments() {
        return $this->belongsToMany('App\Models\Appointment')->withPivot('status');
    }
}
