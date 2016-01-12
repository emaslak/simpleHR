<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'birthdate',
        'job_id',
        'location_id',
        'hired',
    ];

    /**
     * Array of attributes to be added to model
     *
     * @var array
     */
    protected $appends = ['vacationsLeft'];

    /**
     * Returns all employee's vacation objects
     *
     * @return Vacation
     */
    public function vacations()
    {
        return $this->hasMany('App\Vacation');
    }

    /**
     * Returns employee's location
     *
     * @return Location
     */
    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    /**
     * Returns employee's location
     *
     * @return Location
     */
    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    /**
     * Accessor for vacationsLeft property
     *
     * @return int
     */
    public function getVacationsLeftAttribute()
    {
        $now = new Carbon();
        $hired = new Carbon($this->hired);
        if ($hired < $now) {
            $weeksWorked = $now->diffInWeeks($hired);
            $totalVacations = (28 / 52) * $weeksWorked;
            $vacationsTaken = $this->vacations()->sum('duration');

            return (int) $totalVacations - $vacationsTaken;
        }

        return 0;
    }
}
