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
    {!! Form::label('focal_person_id', 'Focal Person:') !!}
    {!! Form::select('focal_person_id', $focalPeople, null,['class' => 'form-control']  ) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('implementingPartners.index') }}" class="btn btn-default">Cancel</a>
</div>

