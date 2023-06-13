<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWisataKandidatRequest;
use App\Http\Requests\UpdateWisataKandidatRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\WisataKandidatRepository;
use Illuminate\Http\Request;
use Flash;
use App\DataTables\WisataKandidatDataTable;

class WisataKandidatController extends AppBaseController
{
    /** @var WisataKandidatRepository $wisataKandidatRepository*/
    private $wisataKandidatRepository;

    public function __construct(WisataKandidatRepository $wisataKandidatRepo)
    {
        $this->wisataKandidatRepository = $wisataKandidatRepo;
    }

    /**
     * Display a listing of the WisataKandidat.
     */ 
    public function index(WisataKandidatDataTable $dataTable)
    {
        return $dataTable->render('wisata_kandidats.index');
    }

    /**
     * Show the form for creating a new WisataKandidat.
     */
    public function create()
    {
        return view('wisata_kandidats.create');
    }

    /**
     * Store a newly created WisataKandidat in storage.
     */
    public function store(CreateWisataKandidatRequest $request)
    {
        $input = $request->all();

        $wisataKandidat = $this->wisataKandidatRepository->create($input);

        Flash::success('Wisata Kandidat saved successfully.');

        return redirect(route('wisataKandidats.index'));
    }

    /**
     * Display the specified WisataKandidat.
     */
    public function show($id)
    {
        $wisataKandidat = $this->wisataKandidatRepository->find($id);

        if (empty($wisataKandidat)) {
            Flash::error('Wisata Kandidat not found');

            return redirect(route('wisataKandidats.index'));
        }

        return view('wisata_kandidats.show')->with('wisataKandidat', $wisataKandidat);
    }

    /**
     * Show the form for editing the specified WisataKandidat.
     */
    public function edit($id)
    {
        $wisataKandidat = $this->wisataKandidatRepository->find($id);

        if (empty($wisataKandidat)) {
            Flash::error('Wisata Kandidat not found');

            return redirect(route('wisataKandidats.index'));
        }

        return view('wisata_kandidats.edit')->with('wisataKandidat', $wisataKandidat);
    }

    /**
     * Update the specified WisataKandidat in storage.
     */
    public function update($id, UpdateWisataKandidatRequest $request)
    {
        $wisataKandidat = $this->wisataKandidatRepository->find($id);

        if (empty($wisataKandidat)) {
            Flash::error('Wisata Kandidat not found');

            return redirect(route('wisataKandidats.index'));
        }

        $wisataKandidat = $this->wisataKandidatRepository->update($request->all(), $id);

        Flash::success('Wisata Kandidat updated successfully.');

        return redirect(route('wisataKandidats.index'));
    }

    /**
     * Remove the specified WisataKandidat from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $wisataKandidat = $this->wisataKandidatRepository->find($id);

        if (empty($wisataKandidat)) {
            Flash::error('Wisata Kandidat not found');

            return redirect(route('wisataKandidats.index'));
        }

        $this->wisataKandidatRepository->delete($id);

        Flash::success('Wisata Kandidat deleted successfully.');

        return redirect(route('wisataKandidats.index'));
    }
}
