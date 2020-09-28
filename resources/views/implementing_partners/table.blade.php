<div class="table-responsive">
    <table class="table" id="implementingPartners-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Website</th>
                <th>Focal Person</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($implementingPartners as $implementingPartner)
            <tr>
                <td>{{ $implementingPartner->name }}</td>
                <td>{{ $implementingPartner->website }}</td>
                <td>{{ $implementingPartner->focalPerson()->first()->first_name }} {{ $implementingPartner->focalPerson()->first()->last_name }}</td>

                <td>
                    {!! Form::open(['route' => ['implementingPartners.destroy', $implementingPartner->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('implementingPartners.show', [$implementingPartner->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('implementingPartners.edit', [$implementingPartner->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
