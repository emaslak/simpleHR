<table id="employeeTable" class="table table-striped">
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Birth date</th>
        <th>Job title</th>
        <th>Location</th>
        <th>Hired on</th>
        <th colspan="2">Vacation days</th>
    </tr>
    @foreach($employees as $employee)
    <tr id="{{$employee['id']}}">
        <td class="firstname">{{$employee['firstname']}}</td>
        <td class="lastname">{{$employee['lastname']}}</td>
        <td class="birthdate">{{$employee['birthdate']}}</td>
        <td class="job" data-id="{{$employee['job']['id']}}">{{$employee['job']['title']}}</td>
        <td class="location" data-id="{{$employee['location']['id']}}">{{$employee['location']['name']}}</td>
        <td class="hired">{{$employee['hired']}}</td>
        <td class="text-center">{{$employee['vacationsLeft']}}</td>
        <td class="text-right">
            <button class="glyphicon glyphicon-eye-open btn employeeVacations" aria-hidden="true" data-toggle="tooltip" title="Show/add vacations"></button>
            <button class="glyphicon glyphicon-edit btn employeeEdit" aria-hidden="true" data-toggle="tooltip" title="Edit employee"></button>
            <button class="glyphicon glyphicon-trash btn employeeDelete" aria-hidden="true" data-toggle="tooltip" title="Delete employee"></button>
        </td>
    </tr>
    @endforeach
</table>