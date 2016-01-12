<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * @var Employee|null
     */
    private $employee = null;

    /**
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Generates employee table response
     *
     * @return \Illuminate\View\View
     */
    public function listTable()
    {
        return view('partials.employeeTable', ['employees' => $this->employee->all()]);
    }

    /**
     * Saves new/existing employee to database and returns status in json response
     *
     * @param Request $request
     * @return array
     */
    public function save(Request $request)
    {
        $id = $request->input('id');
        if (null != $id) {
            $employee = $this->employee->find($id);
            $employee->fill($request->all());
        } else {
            $employee = $this->employee->create($request->all());
        }

        if ($employee->save()) {

            return ['status' => 200];
        }

        return ['status' => 500];
    }

    /**
     * Deletes employee from database and returns status in json response
     *
     * @param $id
     * @return array
     */
    public function delete($id)
    {
        if ($employee = $this->employee->find($id)) {
            if ($employee->delete()) {

                return ['status' => 200];
            }

            return ['status' => 500];
        }

        return ['status' => 404];
    }
}
