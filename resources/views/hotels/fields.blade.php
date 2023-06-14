<!-- Id Wisata Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_wisata', 'Wisata:') !!} 
    <select id="id_wisata" class="form-control" name="id_wisata" required> 
            <option value="@if(isset($hotel->idWisata->id)){{$hotel->idWisata->id}} @endif">@if(isset($hotel->idWisata->nama)){{$hotel->idWisata->nama}}@endif</option> 
    </select>  
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Hotel:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
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