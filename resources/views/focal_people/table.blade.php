<div class="table-responsive">
    <table class="table" id="focalPeople-table">
        <thead>
            <tr>
                <th>First Name</th>
        <th>Last Name</th>
        <th>Middle Name</th>
        <th>Phone</th>
        <th>Email</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($focalPeople as $focalPerson)
            <tr>
                <td>{{ $focalPerson->first_name }}</td>
            <td>{{ $focalPerson->last_name }}</td>
            <td>{{ $focalPerson->middle_name }}</td>
            <td>{{ $focalPerson->phone }}</td>
            <td>{{ $focalPerson->email }}</td>
                <td>
                    {!! Form::open(['route' => ['focalPeople.destroy', $focalPerson->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('focalPeople.show', [$focalPerson->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('focalPeople.edit', [$focalPerson->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
