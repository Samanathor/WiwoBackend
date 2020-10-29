<!-- Postulante Id Field -->
<div class="form-group">
    {!! Form::label('postulante_id', 'Postulante Id:') !!}
    <p>{{ $postulacion->postulante_id }}</p>
</div>

<!-- Vacante Id Field -->
<div class="form-group">
    {!! Form::label('vacante_id', 'Vacante Id:') !!}
    <p>{{ $postulacion->vacante_id }}</p>
</div>

<!-- Respuesta Postulante Field -->
<div class="form-group">
    {!! Form::label('respuesta_postulante', 'Respuesta Postulante:') !!}
    <p>{{ $postulacion->respuesta_postulante }}</p>
</div>

<!-- Respuesta Empleador Field -->
<div class="form-group">
    {!! Form::label('respuesta_empleador', 'Respuesta Empleador:') !!}
    <p>{{ $postulacion->respuesta_empleador }}</p>
</div>

<!-- Activo Field -->
<div class="form-group">
    {!! Form::label('activo', 'Activo:') !!}
    <p>{{ $postulacion->activo }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $postulacion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $postulacion->updated_at }}</p>
</div>

