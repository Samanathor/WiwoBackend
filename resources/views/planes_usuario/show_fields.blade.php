<!-- Plan Id Field -->
<div class="form-group">
    {!! Form::label('plan_id', 'Plan Id:') !!}
    <p>{{ $planUsuario->plan_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $planUsuario->user_id }}</p>
</div>

<!-- Fecha Finalizacion Field -->
<div class="form-group">
    {!! Form::label('fecha_finalizacion', 'Fecha Finalizacion:') !!}
    <p>{{ $planUsuario->fecha_finalizacion }}</p>
</div>

<!-- Activo Field -->
<div class="form-group">
    {!! Form::label('activo', 'Activo:') !!}
    <p>{{ $planUsuario->activo }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $planUsuario->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $planUsuario->updated_at }}</p>
</div>

