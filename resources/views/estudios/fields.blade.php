<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Institucion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institucion', 'Institucion:') !!}
    {!! Form::text('institucion', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Ingreso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_ingreso', 'Fecha Ingreso:') !!}
    {!! Form::text('fecha_ingreso', null, ['class' => 'form-control','id'=>'fecha_ingreso']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#fecha_ingreso').datetimepicker({
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


<!-- Fecha Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_fin', 'Fecha Fin:') !!}
    {!! Form::text('fecha_fin', null, ['class' => 'form-control','id'=>'fecha_fin']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#fecha_fin').datetimepicker({
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


<!-- Tipo Estudio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_estudio', 'Tipo Estudio:') !!}
    {!! Form::select('tipo_estudio', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('estudios.index') }}" class="btn btn-secondary">Cancel</a>
</div>
