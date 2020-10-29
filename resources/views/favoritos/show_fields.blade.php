<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $favorito->user_id }}</p>
</div>

<!-- Favorite Id Field -->
<div class="form-group">
    {!! Form::label('favorite_id', 'Favorite Id:') !!}
    <p>{{ $favorito->favorite_id }}</p>
</div>

<!-- Nota Field -->
<div class="form-group">
    {!! Form::label('nota', 'Nota:') !!}
    <p>{{ $favorito->nota }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $favorito->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $favorito->updated_at }}</p>
</div>

