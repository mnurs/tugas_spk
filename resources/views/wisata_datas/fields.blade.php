<!-- Id Wisata Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_wisata', 'Id Wisata:') !!}
    {!! Form::number('id_wisata', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Fasilitas Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('fasilitas', 'Fasilitas:') !!}
    {!! Form::textarea('fasilitas', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Aksesibilitas Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('aksesibilitas', 'Aksesibilitas:') !!}
    {!! Form::textarea('aksesibilitas', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Biaya Field -->
<div class="form-group col-sm-6">
    {!! Form::label('biaya', 'Biaya:') !!}
    {!! Form::number('biaya', null, ['class' => 'form-control']) !!}
</div>

<!-- Aktifitas Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('aktifitas', 'Aktifitas:') !!}
    {!! Form::textarea('aktifitas', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Kunjungan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kunjungan', 'Kunjungan:') !!}
    {!! Form::text('kunjungan', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>