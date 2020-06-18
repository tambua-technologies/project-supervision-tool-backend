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

<!-- Focal Person name Field -->
<div class="form-group">
    {!! Form::label('focal_person_id', 'Focal Person:') !!}
    <p>{{ $agency->focalPerson()->first()->first_name}} {{ $agency->focalPerson()->first()->middle_name}} {{ $agency->focalPerson()->first()->last_name}}</p>
</div>

<!-- Focal Person Contact -->
<div class="form-group">
    {!! Form::label('email_id', 'Focal Person Email:') !!}
    <p>Phone{{ $agency->focalPerson()->first()->email }}</p>
</div>

