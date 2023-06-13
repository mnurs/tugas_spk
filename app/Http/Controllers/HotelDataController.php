<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHotelDataRequest;
use App\Http\Requests\UpdateHotelDataRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\HotelDataRepository;
use Illuminate\Http\Request;
use Flash;
use App\DataTables\HotelDataDataTable;

class HotelDataController extends AppBaseController
{
    /** @var HotelDataRepository $hotelDataRepository*/
    private $hotelDataRepository;

    public function __construct(HotelDataRepository $hotelDataRepo)
    {
        $this->hotelDataRepository = $hotelDataRepo;
    }

    /**
     * Display a listing of the HotelData.
     */ 
    public function index(HotelDataDataTable $dataTable)
    {
        return $dataTable->render('hotel_datas.index');
    }

    /**
     * Show the form for creating a new HotelData.
     */
    public function create()
    {
        return view('hotel_datas.create');
    }

    /**
     * Store a newly created HotelData in storage.
     */
    public function store(CreateHotelDataRequest $request)
    {
        $input = $request->all();

        $hotelData = $this->hotelDataRepository->create($input);

        Flash::success('Hotel Data saved successfully.');

        return redirect(route('hotelDatas.index'));
    }

    /**
     * Display the specified HotelData.
     */
    public function show($id)
    {
        $hotelData = $this->hotelDataRepository->find($id);

        if (empty($hotelData)) {
            Flash::error('Hotel Data not found');

            return redirect(route('hotelDatas.index'));
        }

        return view('hotel_datas.show')->with('hotelData', $hotelData);
    }

    /**
     * Show the form for editing the specified HotelData.
     */
    public function edit($id)
    {
        $hotelData = $this->hotelDataRepository->find($id);

        if (empty($hotelData)) {
            Flash::error('Hotel Data not found');

            return redirect(route('hotelDatas.index'));
        }

        return view('hotel_datas.edit')->with('hotelData', $hotelData);
    }

    /**
     * Update the specified HotelData in storage.
     */
    public function update($id, UpdateHotelDataRequest $request)
    {
        $hotelData = $this->hotelDataRepository->find($id);

        if (empty($hotelData)) {
            Flash::error('Hotel Data not found');

            return redirect(route('hotelDatas.index'));
        }

        $hotelData = $this->hotelDataRepository->update($request->all(), $id);

        Flash::success('Hotel Data updated successfully.');

        return redirect(route('hotelDatas.index'));
    }

    /**
     * Remove the specified HotelData from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $hotelData = $this->hotelDataRepository->find($id);

        if (empty($hotelData)) {
            Flash::error('Hotel Data not found');

            return redirect(route('hotelDatas.index'));
        }

        $this->hotelDataRepository->delete($id);

        Flash::success('Hotel Data deleted successfully.');

        return redirect(route('hotelDatas.index'));
    }
}
