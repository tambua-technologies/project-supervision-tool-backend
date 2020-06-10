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

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $humanResource->quantity }}</p>
</div>

<!-- Meta Field -->
<div class="form-group">
    {!! Form::label('meta', 'Meta:') !!}
    <p>{{ $humanResource->meta }}</p>
</div>

<!-- Location Id Field -->
<div class="form-group">
    {!! Form::label('location_id', 'Location Id:') !!}
    <p>{{ $humanResource->location_id }}</p>
</div>

<!-- Item Id Field -->
<div class="form-group">
    {!! Form::label('item_id', 'Item Id:') !!}
    <p>{{ $humanResource->item_id }}</p>
</div>

<!-- Agency Id Field -->
<div class="form-group">
    {!! Form::label('agency_id', 'Agency Id:') !!}
    <p>{{ $humanResource->agency_id }}</p>
</div>

