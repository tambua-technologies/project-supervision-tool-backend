<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $fundingOrganisation->name }}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    <p>{{ $fundingOrganisation->website }}</p>
</div>

<!-- Focal Person name Field -->
<div class="form-group">
    {!! Form::label('focal_person_id', 'Focal Person:') !!}
    <p>{{ $fundingOrganisation->focalPerson()->first()->first_name}} {{ $fundingOrganisation  ->focalPerson()->first()->middle_name}} {{ $fundingOrganisation  ->focalPerson()->first()->last_name}}</p>
</div>

<!-- Focal Person Contact -->
<div class="form-group">
    {!! Form::label('email_id', 'Focal Person Email:') !!}
    <p>Phone{{ $fundingOrganisation->focalPerson()->first()->email }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $fundingOrganisation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $fundingOrganisation->updated_at }}</p>
</div>




