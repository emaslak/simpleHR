<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Returns Employees assigned to location
     *
     * @return Employee
     */
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
