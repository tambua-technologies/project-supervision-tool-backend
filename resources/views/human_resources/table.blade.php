<div class="table-responsive">
    <table class="table" id="humanResources-table">
        <thead>
            <tr>
                <th>Start Date</th>
        <th>End Date</th>
        <th>Quantity</th>
        <th>Meta</th>
        <th>Location Id</th>
        <th>Item Id</th>
        <th>Agency Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($humanResources as $humanResource)
            <tr>
                <td>{{ $humanResource->start_date }}</td>
            <td>{{ $humanResource->end_date }}</td>
            <td>{{ $humanResource->quantity }}</td>
            <td>{{ $humanResource->meta }}</td>
            <td>{{ $humanResource->location_id }}</td>
            <td>{{ $humanResource->item_id }}</td>
            <td>{{ $humanResource->agency_id }}</td>
                <td>
                    {!! Form::open(['route' => ['humanResources.destroy', $humanResource->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('humanResources.show', [$humanResource->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('humanResources.edit', [$humanResource->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
