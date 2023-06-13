<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\HotelRepository;
use Illuminate\Http\Request;
use Flash;
use App\DataTables\HotelDataTable;

class HotelController extends AppBaseController
{
    /** @var HotelRepository $hotelRepository*/
    private $hotelRepository;

    public function __construct(HotelRepository $hotelRepo)
    {
        $this->hotelRepository = $hotelRepo;
    }

    /**
     * Display a listing of the Hotel.
     */ 
    public function index(HotelDataTable $dataTable)
    {
        return $dataTable->render('hotels.index');
    }

    /**
     * Show the form for creating a new Hotel.
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created Hotel in storage.
     */
    public function store(CreateHotelRequest $request)
    {
        $input = $request->all();

        $hotel = $this->hotelRepository->create($input);

        Flash::success('Hotel saved successfully.');

        return redirect(route('hotels.index'));
    }

    /**
     * Display the specified Hotel.
     */
    public function show($id)
    {
        $hotel = $this->hotelRepository->find($id);

        if (empty($hotel)) {
            Flash::error('Hotel not found');

            return redirect(route('hotels.index'));
        }

        return view('hotels.show')->with('hotel', $hotel);
    }

    /**
     * Show the form for editing the specified Hotel.
     */
    public function edit($id)
    {
        $hotel = $this->hotelRepository->find($id);

        if (empty($hotel)) {
            Flash::error('Hotel not found');

            return redirect(route('hotels.index'));
        }

        return view('hotels.edit')->with('hotel', $hotel);
    }

    /**
     * Update the specified Hotel in storage.
     */
    public function update($id, UpdateHotelRequest $request)
    {
        $hotel = $this->hotelRepository->find($id);

        if (empty($hotel)) {
            Flash::error('Hotel not found');

            return redirect(route('hotels.index'));
        }

        $hotel = $this->hotelRepository->update($request->all(), $id);

        Flash::success('Hotel updated successfully.');

        return redirect(route('hotels.index'));
    }

    /**
     * Remove the specified Hotel from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $hotel = $this->hotelRepository->find($id);

        if (empty($hotel)) {
            Flash::error('Hotel not found');

            return redirect(route('hotels.index'));
        }

        $this->hotelRepository->delete($id);

        Flash::success('Hotel deleted successfully.');

        return redirect(route('hotels.index'));
    }
}
