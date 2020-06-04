<div class="table-responsive">
    <table class="table" id="stockStatuses-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stockStatuses as $stockStatuses)
            <tr>
                <td>{{ $stockStatuses->name }}</td>
            <td>{{ $stockStatuses->description }}</td>
                <td>
                    {!! Form::open(['route' => ['stockStatuses.destroy', $stockStatuses->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('stockStatuses.show', [$stockStatuses->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('stockStatuses.edit', [$stockStatuses->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
