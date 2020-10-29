<?php

namespace App\Http\Controllers;

use App\DataTables\VacanteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVacanteRequest;
use App\Http\Requests\UpdateVacanteRequest;
use App\Repositories\VacanteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VacanteController extends AppBaseController
{
    /** @var  VacanteRepository */
    private $vacanteRepository;

    public function __construct(VacanteRepository $vacanteRepo)
    {
        $this->vacanteRepository = $vacanteRepo;
    }

    /**
     * Display a listing of the Vacante.
     *
     * @param VacanteDataTable $vacanteDataTable
     * @return Response
     */
    public function index(VacanteDataTable $vacanteDataTable)
    {
        return $vacanteDataTable->render('vacantes.index');
    }

    /**
     * Show the form for creating a new Vacante.
     *
     * @return Response
     */
    public function create()
    {
        return view('vacantes.create');
    }

    /**
     * Store a newly created Vacante in storage.
     *
     * @param CreateVacanteRequest $request
     *
     * @return Response
     */
    public function store(CreateVacanteRequest $request)
    {
        $input = $request->all();

        $vacante = $this->vacanteRepository->create($input);

        Flash::success('Vacante saved successfully.');

        return redirect(route('vacantes.index'));
    }

    /**
     * Display the specified Vacante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vacante = $this->vacanteRepository->find($id);

        if (empty($vacante)) {
            Flash::error('Vacante not found');

            return redirect(route('vacantes.index'));
        }

        return view('vacantes.show')->with('vacante', $vacante);
    }

    /**
     * Show the form for editing the specified Vacante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vacante = $this->vacanteRepository->find($id);

        if (empty($vacante)) {
            Flash::error('Vacante not found');

            return redirect(route('vacantes.index'));
        }

        return view('vacantes.edit')->with('vacante', $vacante);
    }

    /**
     * Update the specified Vacante in storage.
     *
     * @param  int              $id
     * @param UpdateVacanteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVacanteRequest $request)
    {
        $vacante = $this->vacanteRepository->find($id);

        if (empty($vacante)) {
            Flash::error('Vacante not found');

            return redirect(route('vacantes.index'));
        }

        $vacante = $this->vacanteRepository->update($request->all(), $id);

        Flash::success('Vacante updated successfully.');

        return redirect(route('vacantes.index'));
    }

    /**
     * Remove the specified Vacante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vacante = $this->vacanteRepository->find($id);

        if (empty($vacante)) {
            Flash::error('Vacante not found');

            return redirect(route('vacantes.index'));
        }

        $this->vacanteRepository->delete($id);

        Flash::success('Vacante deleted successfully.');

        return redirect(route('vacantes.index'));
    }
}
