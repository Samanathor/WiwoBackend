<!-- User Plan Id Field -->
<div class="form-group">
    {!! Form::label('user_plan_id', 'User Plan Id:') !!}
    <p>{{ $pago->user_plan_id }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $pago->value }}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{{ $pago->tipo }}</p>
</div>

<!-- Fecha Realizacion Field -->
<div class="form-group">
    {!! Form::label('fecha_realizacion', 'Fecha Realizacion:') !!}
    <p>{{ $pago->fecha_realizacion }}</p>
</div>

<!-- Payment Id Field -->
<div class="form-group">
    {!! Form::label('payment_id', 'Payment Id:') !!}
    <p>{{ $pago->payment_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $pago->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $pago->updated_at }}</p>
</div>

