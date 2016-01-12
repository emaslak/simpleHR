@extends('layouts.base')

@section('title', 'Location list')

@section('navigation')
    <li><a href="{{ route('employees') }}">Employees</a></li>
    <li class="active"><a href="{{ route('locations') }}">Locations</a></li>
@stop

@section('content')
    @include('partials.locationTable', ['locations' => $locations])
@stop