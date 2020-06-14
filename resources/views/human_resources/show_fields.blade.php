<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{{ $humanResource->start_date }}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{{ $humanResource->end_date }}</p>
</div>

<!-- Number Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Number:') !!}
    <p>{{ $humanResource->quantity }}</p>
</div>

<!-- Location Field -->
<div class="form-group">
    {!! Form::label('location_id', 'Location:') !!}
    <p>{{ $humanResource->location()->first()->name }}</p>
</div>

<!-- HR Type Field -->
<div class="form-group">
    {!! Form::label('item_id', 'HR Type:') !!}
    <p>{{ $humanResource->item()->first()->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $humanResource->item()->first()->description }}</p>
</div>

<!-- Implementing partner Field -->
<div class="form-group">
    {!! Form::label('agency_id', 'Implementing Partner:') !!}
    <p>{{ $humanResource->agency()->first()->name }}</p>
</div>

