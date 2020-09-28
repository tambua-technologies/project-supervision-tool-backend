<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'Fist Name:') !!}
    <p>{{ $focalPerson->first_name }}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $focalPerson->last_name }}</p>
</div>

<!-- Middle Name Field -->
<div class="form-group">
    {!! Form::label('middle_name', 'Middle Name:') !!}
    <p>{{ $focalPerson->middle_name }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $focalPerson->phone }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $focalPerson->email }}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $focalPerson->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $focalPerson->updated_at }}</p>
</div>
