<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHotelKandidatRequest;
use App\Http\Requests\UpdateHotelKandidatRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\HotelKandidatRepository;
use Illuminate\Http\Request;
use Flash;
use App\DataTables\HotelKandidatDataTable;
use App\Models\{HotelData,HotelKandidat};

class HotelKandidatController extends AppBaseController
{
    /** @var HotelKandidatRepository $hotelKandidatRepository*/
    private $hotelKandidatRepository;

    public function __construct(HotelKandidatRepository $hotelKandidatRepo)
    {
        $this->hotelKandidatRepository = $hotelKandidatRepo;
    }

    /**
     * Display a listing of the HotelKandidat.
     */ 
    public function index(HotelKandidatDataTable $dataTable)
    {
        return $dataTable->render('hotel_kandidats.index');
    }

    /**
     * Show the form for creating a new HotelKandidat.
     */
    public function create()
    {
        return view('hotel_kandidats.create');
    }

    /**
     * Store a newly created HotelKandidat in storage.
     */
    public function store(CreateHotelKandidatRequest $request)
    {
        $input = $request->all();

        $hotelKandidat = $this->hotelKandidatRepository->create($input);

        Flash::success('Hotel Kandidat saved successfully.');

        return redirect(route('hotelKandidats.index'));
    }


    /**
     * Store a newly created HotelKandidat in storage.
     */
    public function generateAsumsi(Request $request)
    {
        $input = $request->all();

        $HotelData = HotelData::all();
        $maxFasilitas = HotelData::selectRaw("MAX(CHAR_LENGTH(fasilitas) - CHAR_LENGTH(REPLACE(fasilitas, ',', ''))) jumlah_fasilitas")->first(); 
        foreach ($HotelData as $key => $data) {
            $cekData = HotelKandidat::where('id_hotel',$data->id_hotel)->first();
            $curFasilitas = HotelData::selectRaw("MAX(CHAR_LENGTH(fasilitas) - CHAR_LENGTH(REPLACE(fasilitas, ',', ''))) jumlah_fasilitas")->where('id_hotel',$data->id_hotel)->first(); 
            $hasilFasilitas = (($curFasilitas->jumlah_fasilitas + 1) / ($maxFasilitas->jumlah_fasilitas + 1));
            if(empty($cekData)){
                $hotelKandidat = $this->hotelKandidatRepository->create([
                    'id_hotel'=>$data->id_hotel,
                    'harga'=>$data->harga,
                    'fasilitas'=> number_format($hasilFasilitas,1),
                    'kelas'=>$data->kelas,
                    'jarak'=>$data->jarak
                ]);
            }else{
                HotelKandidat::where('id_hotel',$data->id_hotel)->update([
                    'id_hotel'=>$data->id_hotel,
                    'harga'=>$data->harga,
                    'fasilitas'=> number_format($hasilFasilitas,1),
                    'kelas'=>$data->kelas,
                    'jarak'=>$data->jarak
                ]);
            }
        } 

        Flash::success('Hotel Kandidat saved successfully.');

        return redirect(route('hotelKandidats.index'));
        // return $maxFasilitas;
    }

    /**
     * Display the specified HotelKandidat.
     */
    public function show($id)
    {
        $hotelKandidat = $this->hotelKandidatRepository->find($id);

        if (empty($hotelKandidat)) {
            Flash::error('Hotel Kandidat not found');

            return redirect(route('hotelKandidats.index'));
        }

        return view('hotel_kandidats.show')->with('hotelKandidat', $hotelKandidat);
    }

    /**
     * Show the form for editing the specified HotelKandidat.
     */
    public function edit($id)
    {
        $hotelKandidat = $this->hotelKandidatRepository->find($id);

        if (empty($hotelKandidat)) {
            Flash::error('Hotel Kandidat not found');

            return redirect(route('hotelKandidats.index'));
        }

        return view('hotel_kandidats.edit')->with('hotelKandidat', $hotelKandidat);
    }

    /**
     * Update the specified HotelKandidat in storage.
     */
    public function update($id, UpdateHotelKandidatRequest $request)
    {
        $hotelKandidat = $this->hotelKandidatRepository->find($id);

        if (empty($hotelKandidat)) {
            Flash::error('Hotel Kandidat not found');

            return redirect(route('hotelKandidats.index'));
        }

        $hotelKandidat = $this->hotelKandidatRepository->update($request->all(), $id);

        Flash::success('Hotel Kandidat updated successfully.');

        return redirect(route('hotelKandidats.index'));
    }

    /**
     * Remove the specified HotelKandidat from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $hotelKandidat = $this->hotelKandidatRepository->find($id);

        if (empty($hotelKandidat)) {
            Flash::error('Hotel Kandidat not found');

            return redirect(route('hotelKandidats.index'));
        }

        $this->hotelKandidatRepository->delete($id);

        Flash::success('Hotel Kandidat deleted successfully.');

        return redirect(route('hotelKandidats.index'));
    }
}
