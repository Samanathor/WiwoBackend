<!-- Plan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plan_id', 'Plan Id:') !!}
    {!! Form::text('plan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Finalizacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_finalizacion', 'Fecha Finalizacion:') !!}
    {!! Form::text('fecha_finalizacion', null, ['class' => 'form-control','id'=>'fecha_finalizacion']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#fecha_finalizacion').datetimepicker({
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


<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    {!! Form::select('activo', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('planesUsuario.index') }}" class="btn btn-secondary">Cancel</a>
</div>
