<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Select Stock Group Cluster Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_group_cluster_id', 'Stock Group Cluster:') !!}
    {!! Form::select('stock_group_cluster_id',$stockGroupClusters, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('stockGroups.index') }}" class="btn btn-default">Cancel</a>
</div>
