<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $experiencia->user_id }}</p>
</div>

<!-- Empresa Field -->
<div class="form-group">
    {!! Form::label('empresa', 'Empresa:') !!}
    <p>{{ $experiencia->empresa }}</p>
</div>

<!-- Fecha Ingreso Field -->
<div class="form-group">
    {!! Form::label('fecha_ingreso', 'Fecha Ingreso:') !!}
    <p>{{ $experiencia->fecha_ingreso }}</p>
</div>

<!-- Fecha Fin Field -->
<div class="form-group">
    {!! Form::label('fecha_fin', 'Fecha Fin:') !!}
    <p>{{ $experiencia->fecha_fin }}</p>
</div>

<!-- Descripcion Cargo Field -->
<div class="form-group">
    {!! Form::label('descripcion_cargo', 'Descripcion Cargo:') !!}
    <p>{{ $experiencia->descripcion_cargo }}</p>
</div>

<!-- Activo Field -->
<div class="form-group">
    {!! Form::label('activo', 'Activo:') !!}
    <p>{{ $experiencia->activo }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $experiencia->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $experiencia->updated_at }}</p>
</div>

