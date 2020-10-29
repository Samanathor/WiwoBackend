<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $denuncia->user_id }}</p>
</div>

<!-- Reporter Id Field -->
<div class="form-group">
    {!! Form::label('reporter_id', 'Reporter Id:') !!}
    <p>{{ $denuncia->reporter_id }}</p>
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{{ $denuncia->fecha }}</p>
</div>

<!-- Tipo Reporte Field -->
<div class="form-group">
    {!! Form::label('tipo_reporte', 'Tipo Reporte:') !!}
    <p>{{ $denuncia->tipo_reporte }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{{ $denuncia->descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $denuncia->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $denuncia->updated_at }}</p>
</div>

