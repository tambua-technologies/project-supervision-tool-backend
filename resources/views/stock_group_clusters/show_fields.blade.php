<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $stockGroupCluster->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $stockGroupCluster->description }}</p>
</div>

<!-- Stock Group Cluster Id Field -->
<div class="form-group">
    {!! Form::label('stock_group_cluster_id', 'Stock Group Cluster Id:') !!}
    <p>{{ $stockGroupCluster->stock_group_cluster_id }}</p>
</div>

