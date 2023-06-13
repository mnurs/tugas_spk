<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWisataDataRequest;
use App\Http\Requests\UpdateWisataDataRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\WisataDataRepository;
use Illuminate\Http\Request;
use Flash;
use App\DataTables\WisataDataDataTable;

class WisataDataController extends AppBaseController
{
    /** @var WisataDataRepository $wisataDataRepository*/
    private $wisataDataRepository;

    public function __construct(WisataDataRepository $wisataDataRepo)
    {
        $this->wisataDataRepository = $wisataDataRepo;
    }

    /**
     * Display a listing of the WisataData.
     */ 
    public function index(WisataDataDataTable $dataTable)
    {
        return $dataTable->render('wisata_datas.index');
    }

    /**
     * Show the form for creating a new WisataData.
     */
    public function create()
    {
        return view('wisata_datas.create');
    }

    /**
     * Store a newly created WisataData in storage.
     */
    public function store(CreateWisataDataRequest $request)
    {
        $input = $request->all();

        $wisataData = $this->wisataDataRepository->create($input);

        Flash::success('Wisata Data saved successfully.');

        return redirect(route('wisataDatas.index'));
    }

    /**
     * Display the specified WisataData.
     */
    public function show($id)
    {
        $wisataData = $this->wisataDataRepository->find($id);

        if (empty($wisataData)) {
            Flash::error('Wisata Data not found');

            return redirect(route('wisataDatas.index'));
        }

        return view('wisata_datas.show')->with('wisataData', $wisataData);
    }

    /**
     * Show the form for editing the specified WisataData.
     */
    public function edit($id)
    {
        $wisataData = $this->wisataDataRepository->find($id);

        if (empty($wisataData)) {
            Flash::error('Wisata Data not found');

            return redirect(route('wisataDatas.index'));
        }

        return view('wisata_datas.edit')->with('wisataData', $wisataData);
    }

    /**
     * Update the specified WisataData in storage.
     */
    public function update($id, UpdateWisataDataRequest $request)
    {
        $wisataData = $this->wisataDataRepository->find($id);

        if (empty($wisataData)) {
            Flash::error('Wisata Data not found');

            return redirect(route('wisataDatas.index'));
        }

        $wisataData = $this->wisataDataRepository->update($request->all(), $id);

        Flash::success('Wisata Data updated successfully.');

        return redirect(route('wisataDatas.index'));
    }

    /**
     * Remove the specified WisataData from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $wisataData = $this->wisataDataRepository->find($id);

        if (empty($wisataData)) {
            Flash::error('Wisata Data not found');

            return redirect(route('wisataDatas.index'));
        }

        $this->wisataDataRepository->delete($id);

        Flash::success('Wisata Data deleted successfully.');

        return redirect(route('wisataDatas.index'));
    }
}
