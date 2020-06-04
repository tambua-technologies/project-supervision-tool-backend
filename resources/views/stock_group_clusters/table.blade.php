<div class="table-responsive">
    <table class="table" id="stockGroupClusters-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
        <th>Stock Group Cluster Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stockGroupClusters as $stockGroupCluster)
            <tr>
                <td>{{ $stockGroupCluster->name }}</td>
            <td>{{ $stockGroupCluster->description }}</td>
            <td>{{ $stockGroupCluster->stock_group_cluster_id }}</td>
                <td>
                    {!! Form::open(['route' => ['stockGroupClusters.destroy', $stockGroupCluster->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('stockGroupClusters.show', [$stockGroupCluster->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('stockGroupClusters.edit', [$stockGroupCluster->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
