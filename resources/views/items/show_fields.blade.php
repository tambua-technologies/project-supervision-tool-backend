<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $item->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $item->description }}</p>
</div>

<!-- Unit Id Field -->
<div class="form-group">
    {!! Form::label('unit_id', 'Unit Id:') !!}
    <p>{{ $item->unit_id }}</p>
</div>

