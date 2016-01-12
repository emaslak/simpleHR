<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', ['as' => 'employees', 'uses' => 'MainController@employees']);
$app->get('locations', ['as' => 'locations', 'uses' => 'MainController@locations']);
$app->get('employee/table', ['as' => 'employeeTable', 'uses' => 'EmployeeController@listTable']);
$app->get('vacation/{employeeId}/table', ['as' => 'vacationTable', 'uses' => 'VacationController@listTable']);

$app->post('employee', ['as' => 'employeeSave', 'uses' => 'EmployeeController@save']);
$app->post('vacation', ['as' => 'vacationSave', 'uses' => 'VacationController@save']);

$app->delete('employee/{id}', ['as' => 'employeeDelete', 'uses' => 'EmployeeController@delete']);
$app->delete('vacation/{id}', ['as' => 'vacationDelete', 'uses' => 'VacationController@delete']);