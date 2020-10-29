<!-- Sexo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sexo', 'Sexo:') !!}
    {!! Form::select('sexo', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Estudios Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_estudios', 'Nivel Estudios:') !!}
    {!! Form::select('nivel_estudios', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Profesion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profesion', 'Profesion:') !!}
    {!! Form::text('profesion', null, ['class' => 'form-control']) !!}
</div>

<!-- Salario Minimo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salario_minimo', 'Salario Minimo:') !!}
    {!! Form::number('salario_minimo', null, ['class' => 'form-control']) !!}
</div>

<!-- Salario Maximo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salario_maximo', 'Salario Maximo:') !!}
    {!! Form::number('salario_maximo', null, ['class' => 'form-control']) !!}
</div>

<!-- Bio Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}
</div>

<!-- Referal User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('referal_user_id', 'Referal User Id:') !!}
    {!! Form::text('referal_user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Verificacion Telefonica Field -->
<div class="form-group col-sm-6">
    {!! Form::label('verificacion_telefonica', 'Verificacion Telefonica:') !!}
    {!! Form::number('verificacion_telefonica', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('perfiles.index') }}" class="btn btn-secondary">Cancel</a>
</div>
