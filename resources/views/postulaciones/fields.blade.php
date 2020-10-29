<!-- Postulante Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postulante_id', 'Postulante Id:') !!}
    {!! Form::text('postulante_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Vacante Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vacante_id', 'Vacante Id:') !!}
    {!! Form::text('vacante_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Respuesta Postulante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('respuesta_postulante', 'Respuesta Postulante:') !!}
    {!! Form::select('respuesta_postulante', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Respuesta Empleador Field -->
<div class="form-group col-sm-6">
    {!! Form::label('respuesta_empleador', 'Respuesta Empleador:') !!}
    {!! Form::select('respuesta_empleador', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    {!! Form::select('activo', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('postulaciones.index') }}" class="btn btn-secondary">Cancel</a>
</div>
