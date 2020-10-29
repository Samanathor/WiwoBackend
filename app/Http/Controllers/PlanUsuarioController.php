<?php

namespace App\Http\Controllers;

use App\DataTables\PlanUsuarioDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePlanUsuarioRequest;
use App\Http\Requests\UpdatePlanUsuarioRequest;
use App\Repositories\PlanUsuarioRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PlanUsuarioController extends AppBaseController
{
    /** @var  PlanUsuarioRepository */
    private $planUsuarioRepository;

    public function __construct(PlanUsuarioRepository $planUsuarioRepo)
    {
        $this->planUsuarioRepository = $planUsuarioRepo;
    }

    /**
     * Display a listing of the PlanUsuario.
     *
     * @param PlanUsuarioDataTable $planUsuarioDataTable
     * @return Response
     */
    public function index(PlanUsuarioDataTable $planUsuarioDataTable)
    {
        return $planUsuarioDataTable->render('planes_usuario.index');
    }

    /**
     * Show the form for creating a new PlanUsuario.
     *
     * @return Response
     */
    public function create()
    {
        return view('planes_usuario.create');
    }

    /**
     * Store a newly created PlanUsuario in storage.
     *
     * @param CreatePlanUsuarioRequest $request
     *
     * @return Response
     */
    public function store(CreatePlanUsuarioRequest $request)
    {
        $input = $request->all();

        $planUsuario = $this->planUsuarioRepository->create($input);

        Flash::success('Plan Usuario saved successfully.');

        return redirect(route('planesUsuario.index'));
    }

    /**
     * Display the specified PlanUsuario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $planUsuario = $this->planUsuarioRepository->find($id);

        if (empty($planUsuario)) {
            Flash::error('Plan Usuario not found');

            return redirect(route('planesUsuario.index'));
        }

        return view('planes_usuario.show')->with('planUsuario', $planUsuario);
    }

    /**
     * Show the form for editing the specified PlanUsuario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $planUsuario = $this->planUsuarioRepository->find($id);

        if (empty($planUsuario)) {
            Flash::error('Plan Usuario not found');

            return redirect(route('planesUsuario.index'));
        }

        return view('planes_usuario.edit')->with('planUsuario', $planUsuario);
    }

    /**
     * Update the specified PlanUsuario in storage.
     *
     * @param  int              $id
     * @param UpdatePlanUsuarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlanUsuarioRequest $request)
    {
        $planUsuario = $this->planUsuarioRepository->find($id);

        if (empty($planUsuario)) {
            Flash::error('Plan Usuario not found');

            return redirect(route('planesUsuario.index'));
        }

        $planUsuario = $this->planUsuarioRepository->update($request->all(), $id);

        Flash::success('Plan Usuario updated successfully.');

        return redirect(route('planesUsuario.index'));
    }

    /**
     * Remove the specified PlanUsuario from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $planUsuario = $this->planUsuarioRepository->find($id);

        if (empty($planUsuario)) {
            Flash::error('Plan Usuario not found');

            return redirect(route('planesUsuario.index'));
        }

        $this->planUsuarioRepository->delete($id);

        Flash::success('Plan Usuario deleted successfully.');

        return redirect(route('planesUsuario.index'));
    }
}
