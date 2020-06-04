<div class="table-responsive">
    <table class="table" id="emergencyResponseThemes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($emergencyResponseThemes as $emergencyResponseTheme)
            <tr>
                <td>{{ $emergencyResponseTheme->name }}</td>
            <td>{{ $emergencyResponseTheme->description }}</td>
                <td>
                    {!! Form::open(['route' => ['emergencyResponseThemes.destroy', $emergencyResponseTheme->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('emergencyResponseThemes.show', [$emergencyResponseTheme->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('emergencyResponseThemes.edit', [$emergencyResponseTheme->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
