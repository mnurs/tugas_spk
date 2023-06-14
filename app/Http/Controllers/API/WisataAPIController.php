<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWisataAPIRequest;
use App\Http\Requests\API\UpdateWisataAPIRequest;
use App\Models\Wisata;
use App\Repositories\WisataRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class WisataAPIController
 */
class WisataAPIController extends AppBaseController
{
    private WisataRepository $wisataRepository;

    public function __construct(WisataRepository $wisataRepo)
    {
        $this->wisataRepository = $wisataRepo;
    }

    /**
     * Display a listing of the Wisatas.
     * GET|HEAD /wisatas
     */
    public function index(Request $request): JsonResponse
    {
        $wisatas = $this->wisataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($wisatas->toArray(), 'Wisatas retrieved successfully');
    }

    /**
     * Store a newly created Wisata in storage.
     * POST /wisatas
     */
    public function store(CreateWisataAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $wisata = $this->wisataRepository->create($input);

        return $this->sendResponse($wisata->toArray(), 'Wisata saved successfully');
    }

    /**
     * Display the specified Wisata.
     * GET|HEAD /wisatas/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Wisata $wisata */
        $wisata = $this->wisataRepository->find($id);

        if (empty($wisata)) {
            return $this->sendError('Wisata not found');
        }

        return $this->sendResponse($wisata->toArray(), 'Wisata retrieved successfully');
    }

    /**
     * Update the specified Wisata in storage.
     * PUT/PATCH /wisatas/{id}
     */
    public function update($id, UpdateWisataAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Wisata $wisata */
        $wisata = $this->wisataRepository->find($id);

        if (empty($wisata)) {
            return $this->sendError('Wisata not found');
        }

        $wisata = $this->wisataRepository->update($input, $id);

        return $this->sendResponse($wisata->toArray(), 'Wisata updated successfully');
    }

    /**
     * Remove the specified Wisata from storage.
     * DELETE /wisatas/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Wisata $wisata */
        $wisata = $this->wisataRepository->find($id);

        if (empty($wisata)) {
            return $this->sendError('Wisata not found');
        }

        $wisata->delete();

        return $this->sendSuccess('Wisata deleted successfully');
    }


    public function getWisata(Request $request)
    {
        $term = $request->input("term");

        $resultByName = $this->wisataRepository->getByName($term);

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
