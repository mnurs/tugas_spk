<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHotelDataAPIRequest;
use App\Http\Requests\API\UpdateHotelDataAPIRequest;
use App\Models\HotelData;
use App\Repositories\HotelDataRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class HotelDataAPIController
 */
class HotelDataAPIController extends AppBaseController
{
    private HotelDataRepository $hotelDataRepository;

    public function __construct(HotelDataRepository $hotelDataRepo)
    {
        $this->hotelDataRepository = $hotelDataRepo;
    }

    /**
     * Display a listing of the HotelDatas.
     * GET|HEAD /hotel-datas
     */
    public function index(Request $request): JsonResponse
    {
        $hotelDatas = $this->hotelDataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($hotelDatas->toArray(), 'Hotel Datas retrieved successfully');
    }

    /**
     * Store a newly created HotelData in storage.
     * POST /hotel-datas
     */
    public function store(CreateHotelDataAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $hotelData = $this->hotelDataRepository->create($input);

        return $this->sendResponse($hotelData->toArray(), 'Hotel Data saved successfully');
    }

    /**
     * Display the specified HotelData.
     * GET|HEAD /hotel-datas/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var HotelData $hotelData */
        $hotelData = $this->hotelDataRepository->find($id);

        if (empty($hotelData)) {
            return $this->sendError('Hotel Data not found');
        }

        return $this->sendResponse($hotelData->toArray(), 'Hotel Data retrieved successfully');
    }

    /**
     * Update the specified HotelData in storage.
     * PUT/PATCH /hotel-datas/{id}
     */
    public function update($id, UpdateHotelDataAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var HotelData $hotelData */
        $hotelData = $this->hotelDataRepository->find($id);

        if (empty($hotelData)) {
            return $this->sendError('Hotel Data not found');
        }

        $hotelData = $this->hotelDataRepository->update($input, $id);

        return $this->sendResponse($hotelData->toArray(), 'HotelData updated successfully');
    }

    /**
     * Remove the specified HotelData from storage.
     * DELETE /hotel-datas/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var HotelData $hotelData */
        $hotelData = $this->hotelDataRepository->find($id);

        if (empty($hotelData)) {
            return $this->sendError('Hotel Data not found');
        }

        $hotelData->delete();

        return $this->sendSuccess('Hotel Data deleted successfully');
    }
}
