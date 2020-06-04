<div class="table-responsive">
    <table class="table" id="stocks-table">
        <thead>
            <tr>
                <th>Start Date</th>
        <th>End Date</th>
        <th>Quantity</th>
        <th>Pace Of Production</th>
        <th>Frequency</th>
        <th>Meta</th>
        <th>Stock Status Id</th>
        <th>Stock Type Id</th>
        <th>Stock Group Cluster Id</th>
        <th>Location Id</th>
        <th>Item Id</th>
        <th>Agency Id</th>
        <th>Emergency Response Theme Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stocks as $stock)
            <tr>
                <td>{{ $stock->start_date }}</td>
            <td>{{ $stock->end_date }}</td>
            <td>{{ $stock->quantity }}</td>
            <td>{{ $stock->pace_of_production }}</td>
            <td>{{ $stock->frequency }}</td>
            <td>{{ $stock->meta }}</td>
            <td>{{ $stock->stock_status_id }}</td>
            <td>{{ $stock->stock_type_id }}</td>
            <td>{{ $stock->stock_group_cluster_id }}</td>
            <td>{{ $stock->location_id }}</td>
            <td>{{ $stock->item_id }}</td>
            <td>{{ $stock->agency_id }}</td>
            <td>{{ $stock->emergency_response_theme_id }}</td>
                <td>
                    {!! Form::open(['route' => ['stocks.destroy', $stock->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('stocks.show', [$stock->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('stocks.edit', [$stock->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
