<div class="table-responsive">
    <table class="table" id="agencies-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Website</th>
        <th>Focal Person Id</th>
        <th>Agency Type Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($agencies as $agency)
            <tr>
                <td>{{ $agency->name }}</td>
            <td>{{ $agency->website }}</td>
            <td>{{ $agency->focal_person_id }}</td>
            <td>{{ $agency->agency_type_id }}</td>
                <td>
                    {!! Form::open(['route' => ['agencies.destroy', $agency->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('agencies.show', [$agency->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('agencies.edit', [$agency->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
