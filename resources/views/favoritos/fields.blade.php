<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Favorite Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('favorite_id', 'Favorite Id:') !!}
    {!! Form::text('favorite_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nota Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('nota', 'Nota:') !!}
    {!! Form::textarea('nota', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('favoritos.index') }}" class="btn btn-secondary">Cancel</a>
</div>
