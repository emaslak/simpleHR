<table class="table table-striped">
    <tr>
        <th>Vacation started</th>
        <th>Vacation ended</th>
        <th colspan="2">Vacation duration (days)</th>
    </tr>
    @foreach($vacations as $vacation)
    <tr data-id="{{$vacation['id']}}">
        <td>{{$vacation['start']}}</td>
        <td>{{$vacation['end']}}</td>
        <td>{{$vacation['duration']}}</td>
        <td class="text-right">
            <button class="glyphicon glyphicon-trash btn vacationDelete" aria-hidden="true" data-toggle="tooltip" title="Delete vacation"></button>
        </td>
    </tr>
    @endforeach
</table>