<?php

namespace App\Http\Controllers;

use App\DataTables\FavoritoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFavoritoRequest;
use App\Http\Requests\UpdateFavoritoRequest;
use App\Repositories\FavoritoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FavoritoController extends AppBaseController
{
    /** @var  FavoritoRepository */
    private $favoritoRepository;

    public function __construct(FavoritoRepository $favoritoRepo)
    {
        $this->favoritoRepository = $favoritoRepo;
    }

    /**
     * Display a listing of the Favorito.
     *
     * @param FavoritoDataTable $favoritoDataTable
     * @return Response
     */
    public function index(FavoritoDataTable $favoritoDataTable)
    {
        return $favoritoDataTable->render('favoritos.index');
    }

    /**
     * Show the form for creating a new Favorito.
     *
     * @return Response
     */
    public function create()
    {
        return view('favoritos.create');
    }

    /**
     * Store a newly created Favorito in storage.
     *
     * @param CreateFavoritoRequest $request
     *
     * @return Response
     */
    public function store(CreateFavoritoRequest $request)
    {
        $input = $request->all();

        $favorito = $this->favoritoRepository->create($input);

        Flash::success('Favorito saved successfully.');

        return redirect(route('favoritos.index'));
    }

    /**
     * Display the specified Favorito.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $favorito = $this->favoritoRepository->find($id);

        if (empty($favorito)) {
            Flash::error('Favorito not found');

            return redirect(route('favoritos.index'));
        }

        return view('favoritos.show')->with('favorito', $favorito);
    }

    /**
     * Show the form for editing the specified Favorito.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $favorito = $this->favoritoRepository->find($id);

        if (empty($favorito)) {
            Flash::error('Favorito not found');

            return redirect(route('favoritos.index'));
        }

        return view('favoritos.edit')->with('favorito', $favorito);
    }

    /**
     * Update the specified Favorito in storage.
     *
     * @param  int              $id
     * @param UpdateFavoritoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFavoritoRequest $request)
    {
        $favorito = $this->favoritoRepository->find($id);

        if (empty($favorito)) {
            Flash::error('Favorito not found');

            return redirect(route('favoritos.index'));
        }

        $favorito = $this->favoritoRepository->update($request->all(), $id);

        Flash::success('Favorito updated successfully.');

        return redirect(route('favoritos.index'));
    }

    /**
     * Remove the specified Favorito from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $favorito = $this->favoritoRepository->find($id);

        if (empty($favorito)) {
            Flash::error('Favorito not found');

            return redirect(route('favoritos.index'));
        }

        $this->favoritoRepository->delete($id);

        Flash::success('Favorito deleted successfully.');

        return redirect(route('favoritos.index'));
    }
}
