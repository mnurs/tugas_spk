<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWisataDataAPIRequest;
use App\Http\Requests\API\UpdateWisataDataAPIRequest;
use App\Models\WisataData;
use App\Repositories\WisataDataRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class WisataDataAPIController
 */
class WisataDataAPIController extends AppBaseController
{
    private WisataDataRepository $wisataDataRepository;

    public function __construct(WisataDataRepository $wisataDataRepo)
    {
        $this->wisataDataRepository = $wisataDataRepo;
    }

    /**
     * Display a listing of the WisataDatas.
     * GET|HEAD /wisata-datas
     */
    public function index(Request $request): JsonResponse
    {
        $wisataDatas = $this->wisataDataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($wisataDatas->toArray(), 'Wisata Datas retrieved successfully');
    }

    /**
     * Store a newly created WisataData in storage.
     * POST /wisata-datas
     */
    public function store(CreateWisataDataAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $wisataData = $this->wisataDataRepository->create($input);

        return $this->sendResponse($wisataData->toArray(), 'Wisata Data saved successfully');
    }

    /**
     * Display the specified WisataData.
     * GET|HEAD /wisata-datas/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var WisataData $wisataData */
        $wisataData = $this->wisataDataRepository->find($id);

        if (empty($wisataData)) {
            return $this->sendError('Wisata Data not found');
        }

        return $this->sendResponse($wisataData->toArray(), 'Wisata Data retrieved successfully');
    }

    /**
     * Update the specified WisataData in storage.
     * PUT/PATCH /wisata-datas/{id}
     */
    public function update($id, UpdateWisataDataAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var WisataData $wisataData */
        $wisataData = $this->wisataDataRepository->find($id);

        if (empty($wisataData)) {
            return $this->sendError('Wisata Data not found');
        }

        $wisataData = $this->wisataDataRepository->update($input, $id);

        return $this->sendResponse($wisataData->toArray(), 'WisataData updated successfully');
    }

    /**
     * Remove the specified WisataData from storage.
     * DELETE /wisata-datas/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var WisataData $wisataData */
        $wisataData = $this->wisataDataRepository->find($id);

        if (empty($wisataData)) {
            return $this->sendError('Wisata Data not found');
        }

        $wisataData->delete();

        return $this->sendSuccess('Wisata Data deleted successfully');
    }
}
