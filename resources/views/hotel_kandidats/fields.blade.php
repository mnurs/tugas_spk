<!-- Id Hotel Field -->
<div class="form-group col-sm-4">
    {!! Form::label('id_wisata', 'Wisata:') !!} 
    <select id="id_wisata" class="form-control" name="id_wisata" required onchange="selectHotel()"> 
        @php
            <option value="@if(isset($hotelKandidat->idHotel->idWisata->id)){{$hotelKandidat->idHotel->idWisata->id}} @endif">@if(isset($hotelKandidat->idHotel->idWisata->nama)){{$hotelKandidat->idHotel->idWisata->nama}}@endif</option> 
    </select>  
</div>

<!-- Id Hotel Field -->
<div class="form-group col-sm-4">
    {!! Form::label('id_hotel', 'Hotel:') !!} 
    <select id="id_hotel" class="form-control" name="id_hotel" required> 
            <option value="@if(isset($hotelKandidat->idHotel->id)){{$hotelKandidat->idHotel->id}} @endif">@if(isset($hotelKandidat->idHotel->nama)){{$hotelKandidat->idHotel->nama}}@endif</option> 
    </select>  
</div>

<!-- Harga Field -->
<div class="form-group col-sm-4">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::number('harga', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Fasilitas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fasilitas', 'Fasilitas:') !!}
    {!! Form::number('fasilitas', null, ['class' => 'form-control', 'required','step' => '0.1']) !!}
</div>

<!-- Kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kelas', 'Kelas:') !!}
    {!! Form::number('kelas', null, ['class' => 'form-control', 'required','step' => '0.1']) !!}
</div>

<!-- Jarak Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jarak', 'Jarak:') !!}
    {!! Form::number('jarak', null, ['class' => 'form-control', 'required','step' => '0.1']) !!}
</div>
@push('third_party_scripts')
    <script type="text/javascript" src="{{ URL::asset('js/helper.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/select2.min.js') }}">
    </script> 
    <script type="text/javascript"> 

        function selectHotel() {
            d = document.getElementById("id_wisata").value; 
            selectCombobox("id_hotel","/api/autocomplete/hotel/"+d); 
        }
        $(document).ready(function(){    
            selectCombobox("id_wisata","/api/autocomplete/wisata"); 
        });
    </script>
@endpush