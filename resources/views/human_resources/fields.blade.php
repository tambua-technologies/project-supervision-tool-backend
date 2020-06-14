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

<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Number:') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>


<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_id', 'Location:') !!}
    {!! Form::select('location_id',$locations, null, ['class' => 'form-control']) !!}
</div>

<!-- Item Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_id', 'HR Type:') !!}
    {!! Form::select('item_id',$items, null, ['class' => 'form-control']) !!}
</div>

<!-- Implementing partner Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agency_id', 'Implementing Partner:') !!}
    {!! Form::select('agency_id',$agencies, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('humanResources.index') }}" class="btn btn-default">Cancel</a>
</div>
