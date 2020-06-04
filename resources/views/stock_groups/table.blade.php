<div class="table-responsive">
    <table class="table" id="stockGroups-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stockGroups as $stockGroup)
            <tr>
                <td>{{ $stockGroup->name }}</td>
            <td>{{ $stockGroup->description }}</td>
                <td>
                    {!! Form::open(['route' => ['stockGroups.destroy', $stockGroup->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('stockGroups.show', [$stockGroup->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('stockGroups.edit', [$stockGroup->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
