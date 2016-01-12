<table class="table table-striped">
    <tr>
        <th>Location</th>
        <th>Number of employees</th>
    </tr>
    @foreach($locations as $location)
    <tr>
        <td>{{$location['name']}}</td>
        <td>{{count($location['employees'])}}</td>
    </tr>
    @endforeach
</table>