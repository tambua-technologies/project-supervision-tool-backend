<div class="table-responsive">
    <table class="table" id="agencyTypes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($agencyTypes as $agencyType)
            <tr>
                <td>{{ $agencyType->name }}</td>
            <td>{{ $agencyType->description }}</td>
                <td>
                    {!! Form::open(['route' => ['agencyTypes.destroy', $agencyType->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('agencyTypes.show', [$agencyType->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('agencyTypes.edit', [$agencyType->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
