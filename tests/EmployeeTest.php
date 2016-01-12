<?php

class EmployeeTest extends TestCase
{
    /**
     * Tests if vacation calculation is right
     */
    public function testVacationsLeftGetter()
    {
        $employee = Mockery::mock('App\Employee[vacations]');

        // Mock 4 used vacation days
        $employee->shouldReceive('vacations')->andReturn(Mockery::mock(['sum' => 4]));

        // Total vacation should be 28 days
        $employee->hired = date("Y-m-d", strtotime('now -1 year'));

        //Result should be 24
        $this->assertEquals(24, $employee->getVacationsLeftAttribute());
    }
}
