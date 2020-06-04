<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Focal Person Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('focal_person_id', 'Focal Person Id:') !!}
    {!! Form::number('focal_person_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Agency Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agency_type_id', 'Agency Type Id:') !!}
    {!! Form::number('agency_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('agencies.index') }}" class="btn btn-default">Cancel</a>
</div>