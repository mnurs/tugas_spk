<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBobotAPIRequest;
use App\Http\Requests\API\UpdateBobotAPIRequest;
use App\Models\Bobot;
use App\Repositories\BobotRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class BobotAPIController
 */
class BobotAPIController extends AppBaseController
{
    private BobotRepository $bobotRepository;

    public function __construct(BobotRepository $bobotRepo)
    {
        $this->bobotRepository = $bobotRepo;
    }

    /**
     * Display a listing of the Bobots.
     * GET|HEAD /bobots
     */
    public function index(Request $request): JsonResponse
    {
        $bobots = $this->bobotRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bobots->toArray(), 'Bobots retrieved successfully');
    }

    /**
     * Store a newly created Bobot in storage.
     * POST /bobots
     */
    public function store(CreateBobotAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $bobot = $this->bobotRepository->create($input);

        return $this->sendResponse($bobot->toArray(), 'Bobot saved successfully');
    }

    /**
     * Display the specified Bobot.
     * GET|HEAD /bobots/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Bobot $bobot */
        $bobot = $this->bobotRepository->find($id);

        if (empty($bobot)) {
            return $this->sendError('Bobot not found');
        }

        return $this->sendResponse($bobot->toArray(), 'Bobot retrieved successfully');
    }

    /**
     * Update the specified Bobot in storage.
     * PUT/PATCH /bobots/{id}
     */
    public function update($id, UpdateBobotAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Bobot $bobot */
        $bobot = $this->bobotRepository->find($id);

        if (empty($bobot)) {
            return $this->sendError('Bobot not found');
        }

        $bobot = $this->bobotRepository->update($input, $id);

        return $this->sendResponse($bobot->toArray(), 'Bobot updated successfully');
    }

    /**
     * Remove the specified Bobot from storage.
     * DELETE /bobots/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Bobot $bobot */
        $bobot = $this->bobotRepository->find($id);

        if (empty($bobot)) {
            return $this->sendError('Bobot not found');
        }

        $bobot->delete();

        return $this->sendSuccess('Bobot deleted successfully');
    }
}
