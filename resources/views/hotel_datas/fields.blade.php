<!-- Id Hotel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_hotel', 'Id Hotel:') !!}
    {!! Form::number('id_hotel', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::number('harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Fasilitas Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('fasilitas', 'Fasilitas:') !!}
    {!! Form::textarea('fasilitas', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kelas', 'Kelas:') !!}
    {!! Form::number('kelas', null, ['class' => 'form-control']) !!}
</div>

<!-- Jarak Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jarak', 'Jarak:') !!}
    {!! Form::number('jarak', null, ['class' => 'form-control']) !!}
</div>