<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWisataKandidatAPIRequest;
use App\Http\Requests\API\UpdateWisataKandidatAPIRequest;
use App\Models\WisataKandidat;
use App\Repositories\WisataKandidatRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class WisataKandidatAPIController
 */
class WisataKandidatAPIController extends AppBaseController
{
    private WisataKandidatRepository $wisataKandidatRepository;

    public function __construct(WisataKandidatRepository $wisataKandidatRepo)
    {
        $this->wisataKandidatRepository = $wisataKandidatRepo;
    }

    /**
     * Display a listing of the WisataKandidats.
     * GET|HEAD /wisata-kandidats
     */
    public function index(Request $request): JsonResponse
    {
        $wisataKandidats = $this->wisataKandidatRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($wisataKandidats->toArray(), 'Wisata Kandidats retrieved successfully');
    }

    /**
     * Store a newly created WisataKandidat in storage.
     * POST /wisata-kandidats
     */
    public function store(CreateWisataKandidatAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $wisataKandidat = $this->wisataKandidatRepository->create($input);

        return $this->sendResponse($wisataKandidat->toArray(), 'Wisata Kandidat saved successfully');
    }

    /**
     * Display the specified WisataKandidat.
     * GET|HEAD /wisata-kandidats/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var WisataKandidat $wisataKandidat */
        $wisataKandidat = $this->wisataKandidatRepository->find($id);

        if (empty($wisataKandidat)) {
            return $this->sendError('Wisata Kandidat not found');
        }

        return $this->sendResponse($wisataKandidat->toArray(), 'Wisata Kandidat retrieved successfully');
    }

    /**
     * Update the specified WisataKandidat in storage.
     * PUT/PATCH /wisata-kandidats/{id}
     */
    public function update($id, UpdateWisataKandidatAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var WisataKandidat $wisataKandidat */
        $wisataKandidat = $this->wisataKandidatRepository->find($id);

        if (empty($wisataKandidat)) {
            return $this->sendError('Wisata Kandidat not found');
        }

        $wisataKandidat = $this->wisataKandidatRepository->update($input, $id);

        return $this->sendResponse($wisataKandidat->toArray(), 'WisataKandidat updated successfully');
    }

    /**
     * Remove the specified WisataKandidat from storage.
     * DELETE /wisata-kandidats/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var WisataKandidat $wisataKandidat */
        $wisataKandidat = $this->wisataKandidatRepository->find($id);

        if (empty($wisataKandidat)) {
            return $this->sendError('Wisata Kandidat not found');
        }

        $wisataKandidat->delete();

        return $this->sendSuccess('Wisata Kandidat deleted successfully');
    }
}
