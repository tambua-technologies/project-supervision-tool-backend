<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Pace Of Production Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pace_of_production', 'Pace Of Production:') !!}
    {!! Form::number('pace_of_production', null, ['class' => 'form-control']) !!}
</div>

<!-- Frequency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frequency', 'Frequency:') !!}
    {!! Form::number('frequency', null, ['class' => 'form-control']) !!}
</div>

<!-- Meta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('meta', 'Meta:') !!}
    {!! Form::text('meta', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_status_id', 'Stock Status Id:') !!}
    {!! Form::number('stock_status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_type_id', 'Stock Type Id:') !!}
    {!! Form::number('stock_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Group Cluster Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_group_cluster_id', 'Stock Group Cluster Id:') !!}
    {!! Form::number('stock_group_cluster_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_id', 'Location Id:') !!}
    {!! Form::number('location_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_id', 'Item Id:') !!}
    {!! Form::number('item_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Agency Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agency_id', 'Agency Id:') !!}
    {!! Form::number('agency_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Emergency Response Theme Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emergency_response_theme_id', 'Emergency Response Theme Id:') !!}
    {!! Form::number('emergency_response_theme_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('stocks.index') }}" class="btn btn-default">Cancel</a>
</div>
