<!-- Nilai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai', 'Nilai:') !!}
    {!! Form::number('nilai', null, ['class' => 'form-control', 'required','step' => '0.1']) !!}
</div>

<!-- Attribut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('attribut', 'Attribut:') !!}
    {!! Form::text('attribut', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>


<!-- Kategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori', 'Kategori:') !!}
    <select class="form-control" name="kategori">
        <option value="hotel" @if(isset($bobot->kategori)) @if($bobot->kategori == 'hotel') selected @endif @endif>Hotel</option>
        <option value="wisata" @if(isset($bobot->kategori)) @if($bobot->kategori == 'wisata') selected @endif @endif>Wisata</option>
    </select> 
</div>

<!-- Is Benefit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_benefit', 'Is Benefit:') !!}
        {!! Form::hidden('is_benefit', 0) !!}
    {!! Form::checkbox('is_benefit', '1', null) !!}
</div>