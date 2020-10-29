<!-- Postulacion Id Field -->
<div class="form-group">
    {!! Form::label('postulacion_id', 'Postulacion Id:') !!}
    <p>{{ $mensaje->postulacion_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $mensaje->user_id }}</p>
</div>

<!-- Mensaje Field -->
<div class="form-group">
    {!! Form::label('mensaje', 'Mensaje:') !!}
    <p>{{ $mensaje->mensaje }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $mensaje->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $mensaje->updated_at }}</p>
</div>

