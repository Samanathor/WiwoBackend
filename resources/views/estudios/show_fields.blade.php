<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $estudio->user_id }}</p>
</div>

<!-- Institucion Field -->
<div class="form-group">
    {!! Form::label('institucion', 'Institucion:') !!}
    <p>{{ $estudio->institucion }}</p>
</div>

<!-- Fecha Ingreso Field -->
<div class="form-group">
    {!! Form::label('fecha_ingreso', 'Fecha Ingreso:') !!}
    <p>{{ $estudio->fecha_ingreso }}</p>
</div>

<!-- Fecha Fin Field -->
<div class="form-group">
    {!! Form::label('fecha_fin', 'Fecha Fin:') !!}
    <p>{{ $estudio->fecha_fin }}</p>
</div>

<!-- Tipo Estudio Field -->
<div class="form-group">
    {!! Form::label('tipo_estudio', 'Tipo Estudio:') !!}
    <p>{{ $estudio->tipo_estudio }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $estudio->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $estudio->updated_at }}</p>
</div>

