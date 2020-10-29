<?php

namespace App\Http\Controllers;

use App\DataTables\SubcategoriaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSubcategoriaRequest;
use App\Http\Requests\UpdateSubcategoriaRequest;
use App\Repositories\SubcategoriaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SubcategoriaController extends AppBaseController
{
    /** @var  SubcategoriaRepository */
    private $subcategoriaRepository;

    public function __construct(SubcategoriaRepository $subcategoriaRepo)
    {
        $this->subcategoriaRepository = $subcategoriaRepo;
    }

    /**
     * Display a listing of the Subcategoria.
     *
     * @param SubcategoriaDataTable $subcategoriaDataTable
     * @return Response
     */
    public function index(SubcategoriaDataTable $subcategoriaDataTable)
    {
        return $subcategoriaDataTable->render('subcategorias.index');
    }

    /**
     * Show the form for creating a new Subcategoria.
     *
     * @return Response
     */
    public function create()
    {
        return view('subcategorias.create');
    }

    /**
     * Store a newly created Subcategoria in storage.
     *
     * @param CreateSubcategoriaRequest $request
     *
     * @return Response
     */
    public function store(CreateSubcategoriaRequest $request)
    {
        $input = $request->all();

        $subcategoria = $this->subcategoriaRepository->create($input);

        Flash::success('Subcategoria saved successfully.');

        return redirect(route('subcategorias.index'));
    }

    /**
     * Display the specified Subcategoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subcategoria = $this->subcategoriaRepository->find($id);

        if (empty($subcategoria)) {
            Flash::error('Subcategoria not found');

            return redirect(route('subcategorias.index'));
        }

        return view('subcategorias.show')->with('subcategoria', $subcategoria);
    }

    /**
     * Show the form for editing the specified Subcategoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subcategoria = $this->subcategoriaRepository->find($id);

        if (empty($subcategoria)) {
            Flash::error('Subcategoria not found');

            return redirect(route('subcategorias.index'));
        }

        return view('subcategorias.edit')->with('subcategoria', $subcategoria);
    }

    /**
     * Update the specified Subcategoria in storage.
     *
     * @param  int              $id
     * @param UpdateSubcategoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubcategoriaRequest $request)
    {
        $subcategoria = $this->subcategoriaRepository->find($id);

        if (empty($subcategoria)) {
            Flash::error('Subcategoria not found');

            return redirect(route('subcategorias.index'));
        }

        $subcategoria = $this->subcategoriaRepository->update($request->all(), $id);

        Flash::success('Subcategoria updated successfully.');

        return redirect(route('subcategorias.index'));
    }

    /**
     * Remove the specified Subcategoria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subcategoria = $this->subcategoriaRepository->find($id);

        if (empty($subcategoria)) {
            Flash::error('Subcategoria not found');

            return redirect(route('subcategorias.index'));
        }

        $this->subcategoriaRepository->delete($id);

        Flash::success('Subcategoria deleted successfully.');

        return redirect(route('subcategorias.index'));
    }
}
