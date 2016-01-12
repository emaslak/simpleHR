<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    /**
     * @var Employee|null
     */
    private $employee = null;
    /**
     * @var Vacation|null
     */
    private $vacation = null;

    /**
     * @param Employee $employee
     * @param Vacation $vacation
     */
    public function __construct(Employee $employee, Vacation $vacation)
    {
        $this->employee = $employee;
        $this->vacation = $vacation;
    }

    /**
     * Generates vacation table response
     *
     * @param $employeeId
     * @return \Illuminate\View\View
     */
    public function listTable($employeeId)
    {
        return view('partials.vacationTable', ['vacations' => $this->employee->find($employeeId)->vacations]);
    }

    /**
     * Saves new vacation entry to database and returns status in json response
     *
     * @TODO: move logic out of controller
     *
     * @param Request $request
     * @return array
     */
    public function save(Request $request)
    {
        $employee = $this->employee->find($request->input('employee_id'));

        $vacationStart = new Carbon($request->input('start'));
        $vacationEnd = new Carbon($request->input('end'));
        $duration = $vacationStart->diffInDays($vacationEnd);

        if (($duration > $employee->vacationsLeft) || ($vacationEnd <= $vacationStart)) {

            return ['status' => 403];
        }

        $overlapingVacations = $employee->vacations()
            ->where('end', '>', $vacationStart)
            ->where('start', '<', $vacationEnd)
            ->get();

        if (!$overlapingVacations->isEmpty()) {

            return ['status' => 403];
        }

        $vacation = $this->vacation->create($request->all());
        $vacation->duration = $duration;

        if ($vacation->save()) {

            return ['status' => 200];
        }

        return ['status' => 500];
    }

    /**
     * Deletes vacation entry from database and returns status in json response
     *
     * @param $id
     * @return array
     */
    public function delete($id)
    {
        if ($vacation = $this->vacation->find($id)) {
            if ($vacation->delete()) {

                return ['status' => 200];
            }

            return ['status' => 500];
        }

        return ['status' => 404];
    }
}
