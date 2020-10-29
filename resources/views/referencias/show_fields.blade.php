<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $referencia->user_id }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $referencia->nombre }}</p>
</div>

<!-- Telefono Contacto Field -->
<div class="form-group">
    {!! Form::label('telefono_contacto', 'Telefono Contacto:') !!}
    <p>{{ $referencia->telefono_contacto }}</p>
</div>

<!-- Relacion Field -->
<div class="form-group">
    {!! Form::label('relacion', 'Relacion:') !!}
    <p>{{ $referencia->relacion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $referencia->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $referencia->updated_at }}</p>
</div>

