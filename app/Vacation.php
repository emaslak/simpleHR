<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'start',
        'end',
        'duration',
    ];

    /**
     * Returns Employee to which vacation belongs
     *
     * @return Employee
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
