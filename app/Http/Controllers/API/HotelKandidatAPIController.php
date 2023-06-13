<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHotelKandidatAPIRequest;
use App\Http\Requests\API\UpdateHotelKandidatAPIRequest;
use App\Models\HotelKandidat;
use App\Repositories\HotelKandidatRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class HotelKandidatAPIController
 */
class HotelKandidatAPIController extends AppBaseController
{
    private HotelKandidatRepository $hotelKandidatRepository;

    public function __construct(HotelKandidatRepository $hotelKandidatRepo)
    {
        $this->hotelKandidatRepository = $hotelKandidatRepo;
    }

    /**
     * Display a listing of the HotelKandidats.
     * GET|HEAD /hotel-kandidats
     */
    public function index(Request $request): JsonResponse
    {
        $hotelKandidats = $this->hotelKandidatRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($hotelKandidats->toArray(), 'Hotel Kandidats retrieved successfully');
    }

    /**
     * Store a newly created HotelKandidat in storage.
     * POST /hotel-kandidats
     */
    public function store(CreateHotelKandidatAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $hotelKandidat = $this->hotelKandidatRepository->create($input);

        return $this->sendResponse($hotelKandidat->toArray(), 'Hotel Kandidat saved successfully');
    }

    /**
     * Display the specified HotelKandidat.
     * GET|HEAD /hotel-kandidats/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var HotelKandidat $hotelKandidat */
        $hotelKandidat = $this->hotelKandidatRepository->find($id);

        if (empty($hotelKandidat)) {
            return $this->sendError('Hotel Kandidat not found');
        }

        return $this->sendResponse($hotelKandidat->toArray(), 'Hotel Kandidat retrieved successfully');
    }

    /**
     * Update the specified HotelKandidat in storage.
     * PUT/PATCH /hotel-kandidats/{id}
     */
    public function update($id, UpdateHotelKandidatAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var HotelKandidat $hotelKandidat */
        $hotelKandidat = $this->hotelKandidatRepository->find($id);

        if (empty($hotelKandidat)) {
            return $this->sendError('Hotel Kandidat not found');
        }

        $hotelKandidat = $this->hotelKandidatRepository->update($input, $id);

        return $this->sendResponse($hotelKandidat->toArray(), 'HotelKandidat updated successfully');
    }

    /**
     * Remove the specified HotelKandidat from storage.
     * DELETE /hotel-kandidats/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var HotelKandidat $hotelKandidat */
        $hotelKandidat = $this->hotelKandidatRepository->find($id);

        if (empty($hotelKandidat)) {
            return $this->sendError('Hotel Kandidat not found');
        }

        $hotelKandidat->delete();

        return $this->sendSuccess('Hotel Kandidat deleted successfully');
    }
}
