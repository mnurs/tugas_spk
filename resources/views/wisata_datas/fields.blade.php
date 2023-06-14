<!-- Id Wisata Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_wisata', 'Wisata:') !!} 
    <select id="id_wisata" class="form-control" name="id_wisata" required> 
            <option value="@if(isset($wisataData->idWisata->id)){{$wisataData->idWisata->id}} @endif">@if(isset($wisataData->idWisata->nama)){{$wisataData->idWisata->nama}}@endif</option> 
    </select>  
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