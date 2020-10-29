<!-- Nombre Cargo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_cargo', 'Nombre Cargo:') !!}
    {!! Form::text('nombre_cargo', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Jornada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_jornada', 'Tipo Jornada:') !!}
    {!! Form::select('tipo_jornada', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Incorporacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_incorporacion', 'Fecha Incorporacion:') !!}
    {!! Form::text('fecha_incorporacion', null, ['class' => 'form-control','id'=>'fecha_incorporacion']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#fecha_incorporacion').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Nivel Experiencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_experiencia', 'Nivel Experiencia:') !!}
    {!! Form::select('nivel_experiencia', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Subcategoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subcategoria_id', 'Subcategoria Id:') !!}
    {!! Form::text('subcategoria_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Salario Inicial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salario_inicial', 'Salario Inicial:') !!}
    {!! Form::number('salario_inicial', null, ['class' => 'form-control']) !!}
</div>

<!-- Salario Final Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salario_final', 'Salario Final:') !!}
    {!! Form::number('salario_final', null, ['class' => 'form-control']) !!}
</div>

<!-- Ciudad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ciudad_id', 'Ciudad Id:') !!}
    {!! Form::text('ciudad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Terminos Condiciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('terminos_condiciones', 'Terminos Condiciones:') !!}
    {!! Form::select('terminos_condiciones', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Vacante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_vacante', 'Tipo Vacante:') !!}
    {!! Form::select('tipo_vacante', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Creador Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('creador_id', 'Creador Id:') !!}
    {!! Form::text('creador_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Vacante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_vacante', 'Estado Vacante:') !!}
    {!! Form::select('estado_vacante', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    {!! Form::select('activo', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Empresa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa_id', 'Empresa Id:') !!}
    {!! Form::text('empresa_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('vacantes.index') }}" class="btn btn-secondary">Cancel</a>
</div>
