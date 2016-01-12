@extends('layouts.base')

@section('title', 'Employee list')

@section('navigation')
    <li class="active"><a href="{{ route('employees') }}">Employees</a></li>
    <li><a href="{{ route('locations') }}">Locations</a></li>
@stop

@section('content')
    <div id="employeeTableWrapper">
        <div class="alert alert-danger hidden" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            Oops.. It seems that such employee doesn't exist or strange error appeared
            <button type="button" class="close closeAlert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @include('partials.employeeTable', ['employees' => $employees])
    </div>
    <button id="addEmployee" class="btn btn-primary pull-right" data-toggle="modal" data-target="#employeeModal">+ Add employee</button>
    @include('partials.employeeModal')
    @include('partials.vacationModal')
@stop