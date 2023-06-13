<!-- Id Wisata Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_wisata', 'Id Wisata:') !!}
    {!! Form::number('id_wisata', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>