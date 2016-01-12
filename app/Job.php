<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    /**
     * Returns Employees assigned to job
     *
     * @return Employee
     */
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
