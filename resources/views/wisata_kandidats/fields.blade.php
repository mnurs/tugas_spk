<!-- Id Wisata Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_wisata', 'Wisata:') !!} 
    <select id="id_wisata" class="form-control" name="id_wisata" required> 
            <option value="@if(isset($wisataKandidat->idWisata->id)){{$wisataKandidat->idWisata->id}} @endif">@if(isset($wisataKandidat->idWisata->nama)){{$wisataKandidat->idWisata->nama}}@endif</option> 
    </select>  
</div>


<!-- Fasilitas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fasilitas', 'Fasilitas:') !!}
    {!! Form::number('fasilitas', null, ['class' => 'form-control', 'required','step' => '0.1']) !!}
</div>

<!-- Aksesibilitas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aksesibilitas', 'Aksesibilitas:') !!}
    {!! Form::number('aksesibilitas', null, ['class' => 'form-control', 'required','step' => '0.1']) !!}
</div>

<!-- Biaya Field -->
<div class="form-group col-sm-6">
    {!! Form::label('biaya', 'Biaya:') !!}
    {!! Form::number('biaya', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Aktifitas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aktifitas', 'Aktifitas:') !!}
    {!! Form::number('aktifitas', null, ['class' => 'form-control', 'required','step' => '0.1']) !!}
</div>

<!-- Kunjungan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kunjungan', 'Kunjungan:') !!}
    {!! Form::number('kunjungan', null, ['class' => 'form-control', 'required']) !!}
</div>
@push('third_party_scripts')
    <script type="text/javascript" src="{{ URL::asset('js/helper.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/select2.min.js') }}">
    </script> 
    <script type="text/javascript"> 
        $(document).ready(function(){    
            selectCombobox("id_wisata","/api/autocomplete/wisata"); 
        });
    </script>
@endpush