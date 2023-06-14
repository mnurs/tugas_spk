<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHotelAPIRequest;
use App\Http\Requests\API\UpdateHotelAPIRequest;
use App\Models\Hotel;
use App\Repositories\HotelRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class HotelAPIController
 */
class HotelAPIController extends AppBaseController
{
    private HotelRepository $hotelRepository;

    public function __construct(HotelRepository $hotelRepo)
    {
        $this->hotelRepository = $hotelRepo;
    }

    /**
     * Display a listing of the Hotels.
     * GET|HEAD /hotels
     */
    public function index(Request $request): JsonResponse
    {
        $hotels = $this->hotelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($hotels->toArray(), 'Hotels retrieved successfully');
    }

    /**
     * Store a newly created Hotel in storage.
     * POST /hotels
     */
    public function store(CreateHotelAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $hotel = $this->hotelRepository->create($input);

        return $this->sendResponse($hotel->toArray(), 'Hotel saved successfully');
    }

    /**
     * Display the specified Hotel.
     * GET|HEAD /hotels/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Hotel $hotel */
        $hotel = $this->hotelRepository->find($id);

        if (empty($hotel)) {
            return $this->sendError('Hotel not found');
        }

        return $this->sendResponse($hotel->toArray(), 'Hotel retrieved successfully');
    }

    /**
     * Update the specified Hotel in storage.
     * PUT/PATCH /hotels/{id}
     */
    public function update($id, UpdateHotelAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Hotel $hotel */
        $hotel = $this->hotelRepository->find($id);

        if (empty($hotel)) {
            return $this->sendError('Hotel not found');
        }

        $hotel = $this->hotelRepository->update($input, $id);

        return $this->sendResponse($hotel->toArray(), 'Hotel updated successfully');
    }

    /**
     * Remove the specified Hotel from storage.
     * DELETE /hotels/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Hotel $hotel */
        $hotel = $this->hotelRepository->find($id);

        if (empty($hotel)) {
            return $this->sendError('Hotel not found');
        }

        $hotel->delete();

        return $this->sendSuccess('Hotel deleted successfully');
    }

    public function getHotelByWisata($idWisata,Request $request)
    {
        $term = $request->input("term");

        $resultByName = $this->hotelRepository->getByNameWisata($term,$idWisata);

        $output = [];
        foreach ($resultByName as $key => $value) {
            $output[$key] = [
              "id" => $value->id ,
              "label" => $value->nama,
              "value" => $value->nama
            ];
        }

        return $output;
    }
}
