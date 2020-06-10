<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $stockGroup->name }}</p>
</div>

<!-- Stock Group cluster Field -->
<div class="form-group">
    {!! Form::label('stock_group_cluster', 'Group Cluster:') !!}
    <p>{{ $stockGroup->stockGroupCluster()->first()->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $stockGroup->description }}</p>
</div>

