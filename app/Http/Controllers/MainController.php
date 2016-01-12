<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Job;
use App\Location;

class MainController extends Controller
{
    /**
     * Generates employee list view
     *
     * @return \Illuminate\View\View
     */
    public function employees()
    {
        return view(
            'employees',
            [
                'employees' => Employee::all(),
                'jobs'      => Job::all(),
                'locations' => Location::all()
            ]
        );
    }

    /**
     * Generates locations view
     *
     * @return \Illuminate\View\View
     */
    public function locations()
    {
        return view('locations', ['locations' => Location::all()]);
    }
}
