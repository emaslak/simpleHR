<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeeTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'birthdate' => '1990-01-01',
            'job_id' => 1,
            'location_id' => 1,
            'hired' => '2016-01-05',
        ]);
        Employee::create([
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'birthdate' => '1991-01-01',
            'job_id' => 3,
            'location_id' => 1,
            'hired' => '2016-01-08',
        ]);
        Employee::create([
            'firstname' => 'Foo',
            'lastname' => 'Bar',
            'birthdate' => '1993-03-01',
            'job_id' => 2,
            'location_id' => 2,
            'hired' => '2015-11-05',
        ]);
    }
}