<div class="table-responsive">
    <table class="table" id="humanResources-table">
        <thead>
            <tr>
        <th>HR Type</th>
        <th>Description</th>
        <th>Implementing Partner </th>
        <th>Number</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Location</th>
        <th>Aggregation Level</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($humanResources as $humanResource)
            <tr>
            <td>{{ $humanResource->item()->first()->name }}</td>
            <td>{{ $humanResource->item()->first()->description }}</td>
            <td>{{ $humanResource->agency()->first()->name }}</td>
            <td>{{ $humanResource->quantity }}</td>
            <td>{{ $humanResource->start_date }}</td>
            <td>{{ $humanResource->end_date }}</td>
            <td>{{ $humanResource->location()->first()->name }}</td>
            <td>{{ $humanResource->location()->first()->level }}</td>
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
