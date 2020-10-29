<!-- User Plan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_plan_id', 'User Plan Id:') !!}
    {!! Form::text('user_plan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::number('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Realizacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_realizacion', 'Fecha Realizacion:') !!}
    {!! Form::text('fecha_realizacion', null, ['class' => 'form-control','id'=>'fecha_realizacion']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#fecha_realizacion').datetimepicker({
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


<!-- Payment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_id', 'Payment Id:') !!}
    {!! Form::text('payment_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cancel</a>
</div>
