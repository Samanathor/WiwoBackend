<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $configuracion->user_id }}</p>
</div>

<!-- Notificaciones Field -->
<div class="form-group">
    {!! Form::label('notificaciones', 'Notificaciones:') !!}
    <p>{{ $configuracion->notificaciones }}</p>
</div>

<!-- Visible Field -->
<div class="form-group">
    {!! Form::label('visible', 'Visible:') !!}
    <p>{{ $configuracion->visible }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $configuracion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $configuracion->updated_at }}</p>
</div>

