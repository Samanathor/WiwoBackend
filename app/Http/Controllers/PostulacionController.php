<?php

namespace App\Http\Controllers;

use App\DataTables\PostulacionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePostulacionRequest;
use App\Http\Requests\UpdatePostulacionRequest;
use App\Repositories\PostulacionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PostulacionController extends AppBaseController
{
    /** @var  PostulacionRepository */
    private $postulacionRepository;

    public function __construct(PostulacionRepository $postulacionRepo)
    {
        $this->postulacionRepository = $postulacionRepo;
    }

    /**
     * Display a listing of the Postulacion.
     *
     * @param PostulacionDataTable $postulacionDataTable
     * @return Response
     */
    public function index(PostulacionDataTable $postulacionDataTable)
    {
        return $postulacionDataTable->render('postulaciones.index');
    }

    /**
     * Show the form for creating a new Postulacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('postulaciones.create');
    }

    /**
     * Store a newly created Postulacion in storage.
     *
     * @param CreatePostulacionRequest $request
     *
     * @return Response
     */
    public function store(CreatePostulacionRequest $request)
    {
        $input = $request->all();

        $postulacion = $this->postulacionRepository->create($input);

        Flash::success('Postulacion saved successfully.');

        return redirect(route('postulaciones.index'));
    }

    /**
     * Display the specified Postulacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postulacion = $this->postulacionRepository->find($id);

        if (empty($postulacion)) {
            Flash::error('Postulacion not found');

            return redirect(route('postulaciones.index'));
        }

        return view('postulaciones.show')->with('postulacion', $postulacion);
    }

    /**
     * Show the form for editing the specified Postulacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postulacion = $this->postulacionRepository->find($id);

        if (empty($postulacion)) {
            Flash::error('Postulacion not found');

            return redirect(route('postulaciones.index'));
        }

        return view('postulaciones.edit')->with('postulacion', $postulacion);
    }

    /**
     * Update the specified Postulacion in storage.
     *
     * @param  int              $id
     * @param UpdatePostulacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostulacionRequest $request)
    {
        $postulacion = $this->postulacionRepository->find($id);

        if (empty($postulacion)) {
            Flash::error('Postulacion not found');

            return redirect(route('postulaciones.index'));
        }

        $postulacion = $this->postulacionRepository->update($request->all(), $id);

        Flash::success('Postulacion updated successfully.');

        return redirect(route('postulaciones.index'));
    }

    /**
     * Remove the specified Postulacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postulacion = $this->postulacionRepository->find($id);

        if (empty($postulacion)) {
            Flash::error('Postulacion not found');

            return redirect(route('postulaciones.index'));
        }

        $this->postulacionRepository->delete($id);

        Flash::success('Postulacion deleted successfully.');

        return redirect(route('postulaciones.index'));
    }
}
