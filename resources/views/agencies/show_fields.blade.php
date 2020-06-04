<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $agency->name }}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    <p>{{ $agency->website }}</p>
</div>

<!-- Focal Person Id Field -->
<div class="form-group">
    {!! Form::label('focal_person_id', 'Focal Person Id:') !!}
    <p>{{ $agency->focal_person_id }}</p>
</div>

<!-- Agency Type Id Field -->
<div class="form-group">
    {!! Form::label('agency_type_id', 'Agency Type Id:') !!}
    <p>{{ $agency->agency_type_id }}</p>
</div>

