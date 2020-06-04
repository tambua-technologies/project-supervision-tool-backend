<div class="table-responsive">
    <table class="table" id="stockTypes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stockTypes as $stockType)
            <tr>
                <td>{{ $stockType->name }}</td>
            <td>{{ $stockType->description }}</td>
                <td>
                    {!! Form::open(['route' => ['stockTypes.destroy', $stockType->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('stockTypes.show', [$stockType->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('stockTypes.edit', [$stockType->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
