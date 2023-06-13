<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBobotRequest;
use App\Http\Requests\UpdateBobotRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BobotRepository;
use Illuminate\Http\Request;
use Flash;

class BobotController extends AppBaseController
{
    /** @var BobotRepository $bobotRepository*/
    private $bobotRepository;

    public function __construct(BobotRepository $bobotRepo)
    {
        $this->bobotRepository = $bobotRepo;
    }

    /**
     * Display a listing of the Bobot.
     */
    public function index(Request $request)
    {
        $bobots = $this->bobotRepository->paginate(10);

        return view('bobots.index')
            ->with('bobots', $bobots);
    }

    /**
     * Show the form for creating a new Bobot.
     */
    public function create()
    {
        return view('bobots.create');
    }

    /**
     * Store a newly created Bobot in storage.
     */
    public function store(CreateBobotRequest $request)
    {
        $input = $request->all();

        $bobot = $this->bobotRepository->create($input);

        Flash::success('Bobot saved successfully.');

        return redirect(route('bobots.index'));
    }

    /**
     * Display the specified Bobot.
     */
    public function show($id)
    {
        $bobot = $this->bobotRepository->find($id);

        if (empty($bobot)) {
            Flash::error('Bobot not found');

            return redirect(route('bobots.index'));
        }

        return view('bobots.show')->with('bobot', $bobot);
    }

    /**
     * Show the form for editing the specified Bobot.
     */
    public function edit($id)
    {
        $bobot = $this->bobotRepository->find($id);

        if (empty($bobot)) {
            Flash::error('Bobot not found');

            return redirect(route('bobots.index'));
        }

        return view('bobots.edit')->with('bobot', $bobot);
    }

    /**
     * Update the specified Bobot in storage.
     */
    public function update($id, UpdateBobotRequest $request)
    {
        $bobot = $this->bobotRepository->find($id);

        if (empty($bobot)) {
            Flash::error('Bobot not found');

            return redirect(route('bobots.index'));
        }

        $bobot = $this->bobotRepository->update($request->all(), $id);

        Flash::success('Bobot updated successfully.');

        return redirect(route('bobots.index'));
    }

    /**
     * Remove the specified Bobot from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bobot = $this->bobotRepository->find($id);

        if (empty($bobot)) {
            Flash::error('Bobot not found');

            return redirect(route('bobots.index'));
        }

        $this->bobotRepository->delete($id);

        Flash::success('Bobot deleted successfully.');

        return redirect(route('bobots.index'));
    }
}
