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
        <th>Stock Status</th>
        <th>Stock Type</th>
        <th>Stock Group</th>
        <th>Location</th>
        <th>Item</th>
        <th>Agency</th>
        <th>Emergency Response Theme</th>
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
            <td>{{ $stock->stockStatus()->first()->name }}</td>
            <td>{{ $stock->stockType()->first()->name }}</td>
            <td>{{ $stock->stockGroup()->first()->name }}</td>
            <td>{{ $stock->location()->first()->name }}</td>
            <td>{{ $stock->item()->first()->name }}</td>
            <td>{{ $stock->agency()->first()->name }}</td>
            <td>{{ $stock->emergencyResponseTheme()->first()->name }}</td>
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
