<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Identificacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identificacion', 'Identificacion:') !!}
    {!! Form::text('identificacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Ciudad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ciudad_id', 'Ciudad Id:') !!}
    {!! Form::text('ciudad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Facebook Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebook_url', 'Facebook Url:') !!}
    {!! Form::text('facebook_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Instagram Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instagram_url', 'Instagram Url:') !!}
    {!! Form::text('instagram_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Video Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video', 'Video:') !!}
    {!! Form::file('video') !!}
</div>
<div class="clearfix"></div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'Categoria Id:') !!}
    {!! Form::text('categoria_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Beneficios Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('beneficios', 'Beneficios:') !!}
    {!! Form::textarea('beneficios', null, ['class' => 'form-control']) !!}
</div>

<!-- Tamano Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tamano', 'Tamano:') !!}
    {!! Form::text('tamano', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipos Contratacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipos_contratacion', 'Tipos Contratacion:') !!}
    {!! Form::text('tipos_contratacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Frecuencia Contrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frecuencia_contrato', 'Frecuencia Contrato:') !!}
    {!! Form::text('frecuencia_contrato', null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    {!! Form::select('activo', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancel</a>
</div>
