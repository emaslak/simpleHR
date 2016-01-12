<?php

class VacationControllerTest extends TestCase
{
    /**
     *
     */
    public function tearDown()
    {
        Mockery::close();
    }

    /**
     * Test all possible failures caused by bad start/end vacation date pairs
     */
    public function testSaveFails()
    {
        $employeeMock = Mockery::mock('Eloquent', 'App\Employee');
        $collectionMock = Mockery::mock('Illuminate\Database\Eloquent\Collection');
        $collectionMock->shouldReceive('isEmpty')->once()->andReturn(false);
        $employeeMock->shouldReceive('getAttribute')
            ->with('vacationsLeft')
            ->andReturn(5);
        $employeeMock->shouldReceive('find')->times(4)->andReturnSelf();
        $employeeMock->shouldReceive('vacations->where->where->get')->andReturn($collectionMock);
        $this->app->instance('App\Employee', $employeeMock);

        $data = [
            // Difference bigger than employee has vacations, shouldn't pass first if
            ['start' => '2016-01-01', 'end' => '2016-01-10'],
            // Same dates, shouldn't pass first if
            ['start' => '2016-01-01', 'end' => '2016-01-01'],
            // End date bigger than start date, shouldn't pass first if
            ['start' => '2016-01-05', 'end' => '2016-01-01'],
            // Dates overlap with ones in database (emulated with 'isEmpty' false mock)
            ['start' => '2016-01-01', 'end' => '2016-01-05'],
        ];

        foreach ($data as $case) {
            $jsonResponse = $this->call('POST', 'vacation', $case);
            $response = json_decode($jsonResponse->content());
            $this->assertEquals(403, $response->status);
        }
    }

    /**
     * Test with good start/end vacation date pair
     */
    public function testSave()
    {
        $employeeMock = Mockery::mock('Eloquent', 'App\Employee');
        $collectionMock = Mockery::mock('Illuminate\Database\Eloquent\Collection');
        $collectionMock->shouldReceive('isEmpty')->once()->andReturn(true);
        $employeeMock ->shouldReceive('getAttribute')
            ->with('vacationsLeft')
            ->andReturn(5);
        $employeeMock->shouldReceive('find')->once()->andReturnSelf();
        $employeeMock->shouldReceive('vacations->where->where->get')->andReturn($collectionMock);
        $vacationMock = Mockery::mock('Eloquent', 'App\Vacation');
        $vacationMock->shouldReceive('create')->once()->andReturnSelf();
        $vacationMock->shouldReceive('save')->once()->andReturn(true);
        $vacationMock->shouldReceive('setAttribute')->once();

        $this->app->instance('App\Employee', $employeeMock);
        $this->app->instance('App\Vacation', $vacationMock);

        $jsonResponse = $this->call('POST', 'vacation', ['start' => '2016-01-01', 'end' => '2016-01-05']);
        $response = json_decode($jsonResponse->content());
        $this->assertEquals(200, $response->status);
    }
}
