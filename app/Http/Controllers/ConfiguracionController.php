<?php

namespace App\Http\Controllers;

use App\DataTables\ConfiguracionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateConfiguracionRequest;
use App\Http\Requests\UpdateConfiguracionRequest;
use App\Repositories\ConfiguracionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ConfiguracionController extends AppBaseController
{
    /** @var  ConfiguracionRepository */
    private $configuracionRepository;

    public function __construct(ConfiguracionRepository $configuracionRepo)
    {
        $this->configuracionRepository = $configuracionRepo;
    }

    /**
     * Display a listing of the Configuracion.
     *
     * @param ConfiguracionDataTable $configuracionDataTable
     * @return Response
     */
    public function index(ConfiguracionDataTable $configuracionDataTable)
    {
        return $configuracionDataTable->render('configuraciones.index');
    }

    /**
     * Show the form for creating a new Configuracion.
     *
     * @return Response
     */
    public function create()
    {
        return view('configuraciones.create');
    }

    /**
     * Store a newly created Configuracion in storage.
     *
     * @param CreateConfiguracionRequest $request
     *
     * @return Response
     */
    public function store(CreateConfiguracionRequest $request)
    {
        $input = $request->all();

        $configuracion = $this->configuracionRepository->create($input);

        Flash::success('Configuracion saved successfully.');

        return redirect(route('configuraciones.index'));
    }

    /**
     * Display the specified Configuracion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $configuracion = $this->configuracionRepository->find($id);

        if (empty($configuracion)) {
            Flash::error('Configuracion not found');

            return redirect(route('configuraciones.index'));
        }

        return view('configuraciones.show')->with('configuracion', $configuracion);
    }

    /**
     * Show the form for editing the specified Configuracion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $configuracion = $this->configuracionRepository->find($id);

        if (empty($configuracion)) {
            Flash::error('Configuracion not found');

            return redirect(route('configuraciones.index'));
        }

        return view('configuraciones.edit')->with('configuracion', $configuracion);
    }

    /**
     * Update the specified Configuracion in storage.
     *
     * @param  int              $id
     * @param UpdateConfiguracionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConfiguracionRequest $request)
    {
        $configuracion = $this->configuracionRepository->find($id);

        if (empty($configuracion)) {
            Flash::error('Configuracion not found');

            return redirect(route('configuraciones.index'));
        }

        $configuracion = $this->configuracionRepository->update($request->all(), $id);

        Flash::success('Configuracion updated successfully.');

        return redirect(route('configuraciones.index'));
    }

    /**
     * Remove the specified Configuracion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $configuracion = $this->configuracionRepository->find($id);

        if (empty($configuracion)) {
            Flash::error('Configuracion not found');

            return redirect(route('configuraciones.index'));
        }

        $this->configuracionRepository->delete($id);

        Flash::success('Configuracion deleted successfully.');

        return redirect(route('configuraciones.index'));
    }
}
