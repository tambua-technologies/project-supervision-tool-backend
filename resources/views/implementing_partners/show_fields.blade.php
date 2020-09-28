<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $implementingPartner  ->name }}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    <p>{{ $implementingPartner  ->website }}</p>
</div>

<!-- Focal Person name Field -->
<div class="form-group">
    {!! Form::label('focal_person_id', 'Focal Person:') !!}
    <p>{{ $implementingPartner  ->focalPerson()->first()->first_name}} {{ $implementingPartner  ->focalPerson()->first()->middle_name}} {{ $implementingPartner  ->focalPerson()->first()->last_name}}</p>
</div>

<!-- Focal Person Contact -->
<div class="form-group">
    {!! Form::label('email_id', 'Focal Person Email:') !!}
    <p>Phone{{ $implementingPartner  ->focalPerson()->first()->email }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $implementingPartner->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $implementingPartner->updated_at }}</p>
</div>


