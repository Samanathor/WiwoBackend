<?php

namespace App\Http\Controllers;

use App\DataTables\ReferenciaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateReferenciaRequest;
use App\Http\Requests\UpdateReferenciaRequest;
use App\Repositories\ReferenciaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ReferenciaController extends AppBaseController
{
    /** @var  ReferenciaRepository */
    private $referenciaRepository;

    public function __construct(ReferenciaRepository $referenciaRepo)
    {
        $this->referenciaRepository = $referenciaRepo;
    }

    /**
     * Display a listing of the Referencia.
     *
     * @param ReferenciaDataTable $referenciaDataTable
     * @return Response
     */
    public function index(ReferenciaDataTable $referenciaDataTable)
    {
        return $referenciaDataTable->render('referencias.index');
    }

    /**
     * Show the form for creating a new Referencia.
     *
     * @return Response
     */
    public function create()
    {
        return view('referencias.create');
    }

    /**
     * Store a newly created Referencia in storage.
     *
     * @param CreateReferenciaRequest $request
     *
     * @return Response
     */
    public function store(CreateReferenciaRequest $request)
    {
        $input = $request->all();

        $referencia = $this->referenciaRepository->create($input);

        Flash::success('Referencia saved successfully.');

        return redirect(route('referencias.index'));
    }

    /**
     * Display the specified Referencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $referencia = $this->referenciaRepository->find($id);

        if (empty($referencia)) {
            Flash::error('Referencia not found');

            return redirect(route('referencias.index'));
        }

        return view('referencias.show')->with('referencia', $referencia);
    }

    /**
     * Show the form for editing the specified Referencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $referencia = $this->referenciaRepository->find($id);

        if (empty($referencia)) {
            Flash::error('Referencia not found');

            return redirect(route('referencias.index'));
        }

        return view('referencias.edit')->with('referencia', $referencia);
    }

    /**
     * Update the specified Referencia in storage.
     *
     * @param  int              $id
     * @param UpdateReferenciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReferenciaRequest $request)
    {
        $referencia = $this->referenciaRepository->find($id);

        if (empty($referencia)) {
            Flash::error('Referencia not found');

            return redirect(route('referencias.index'));
        }

        $referencia = $this->referenciaRepository->update($request->all(), $id);

        Flash::success('Referencia updated successfully.');

        return redirect(route('referencias.index'));
    }

    /**
     * Remove the specified Referencia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $referencia = $this->referenciaRepository->find($id);

        if (empty($referencia)) {
            Flash::error('Referencia not found');

            return redirect(route('referencias.index'));
        }

        $this->referenciaRepository->delete($id);

        Flash::success('Referencia deleted successfully.');

        return redirect(route('referencias.index'));
    }
}
