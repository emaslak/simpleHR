<?php

use Illuminate\Database\Seeder;
use App\Job;

class JobTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
             'title' => 'Programmer',
        ]);
        Job::create([
             'title' => 'Project manager',
        ]);
        Job::create([
             'title' => 'Accountant',
        ]);
    }
}