<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWisataRequest;
use App\Http\Requests\UpdateWisataRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\WisataRepository;
use Illuminate\Http\Request;
use Flash;
use App\DataTables\WisataDataTable;

class WisataController extends AppBaseController
{
    /** @var WisataRepository $wisataRepository*/
    private $wisataRepository;

    public function __construct(WisataRepository $wisataRepo)
    {
        $this->wisataRepository = $wisataRepo;
    }

    /**
     * Display a listing of the Wisata.
     */ 
    public function index(WisataDataTable $dataTable)
    {
        return $dataTable->render('wisatas.index');
    }

    /**
     * Show the form for creating a new Wisata.
     */
    public function create()
    {
        return view('wisatas.create');
    }

    /**
     * Store a newly created Wisata in storage.
     */
    public function store(CreateWisataRequest $request)
    {
        $input = $request->all();

        $wisata = $this->wisataRepository->create($input);

        Flash::success('Wisata saved successfully.');

        return redirect(route('wisatas.index'));
    }

    /**
     * Display the specified Wisata.
     */
    public function show($id)
    {
        $wisata = $this->wisataRepository->find($id);

        if (empty($wisata)) {
            Flash::error('Wisata not found');

            return redirect(route('wisatas.index'));
        }

        return view('wisatas.show')->with('wisata', $wisata);
    }

    /**
     * Show the form for editing the specified Wisata.
     */
    public function edit($id)
    {
        $wisata = $this->wisataRepository->find($id);

        if (empty($wisata)) {
            Flash::error('Wisata not found');

            return redirect(route('wisatas.index'));
        }

        return view('wisatas.edit')->with('wisata', $wisata);
    }

    /**
     * Update the specified Wisata in storage.
     */
    public function update($id, UpdateWisataRequest $request)
    {
        $wisata = $this->wisataRepository->find($id);

        if (empty($wisata)) {
            Flash::error('Wisata not found');

            return redirect(route('wisatas.index'));
        }

        $wisata = $this->wisataRepository->update($request->all(), $id);

        Flash::success('Wisata updated successfully.');

        return redirect(route('wisatas.index'));
    }

    /**
     * Remove the specified Wisata from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $wisata = $this->wisataRepository->find($id);

        if (empty($wisata)) {
            Flash::error('Wisata not found');

            return redirect(route('wisatas.index'));
        }

        $this->wisataRepository->delete($id);

        Flash::success('Wisata deleted successfully.');

        return redirect(route('wisatas.index'));
    }
}
