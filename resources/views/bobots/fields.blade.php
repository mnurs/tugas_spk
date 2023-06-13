<!-- Nilai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai', 'Nilai:') !!}
    {!! Form::number('nilai', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Attribut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('attribut', 'Attribut:') !!}
    {!! Form::text('attribut', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Is Benefit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_benefit', 'Is Benefit:') !!}
    {!! Form::number('is_benefit', null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori', 'Kategori:') !!}
    {!! Form::text('kategori', null, ['class' => 'form-control', 'required']) !!}
</div>