<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFavoritoAPIRequest;
use App\Http\Requests\API\UpdateFavoritoAPIRequest;
use App\Models\Favorito;
use App\Repositories\FavoritoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FavoritoController
 * @package App\Http\Controllers\API
 */

class FavoritoAPIController extends AppBaseController
{
    /** @var  FavoritoRepository */
    private $favoritoRepository;

    public function __construct(FavoritoRepository $favoritoRepo)
    {
        $this->favoritoRepository = $favoritoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/favoritos",
     *      summary="Get a listing of the Favoritos.",
     *      tags={"Favorito"},
     *      description="Get all Favoritos",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Favorito")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $favoritos = $this->favoritoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($favoritos->toArray(), 'Favoritos retrieved successfully');
    }

    /**
     * @param CreateFavoritoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/favoritos",
     *      summary="Store a newly created Favorito in storage",
     *      tags={"Favorito"},
     *      description="Store Favorito",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Favorito that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Favorito")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Favorito"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFavoritoAPIRequest $request)
    {
        $input = $request->all();

        $favorito = $this->favoritoRepository->create($input);

        return $this->sendResponse($favorito->toArray(), 'Favorito saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/favoritos/{id}",
     *      summary="Display the specified Favorito",
     *      tags={"Favorito"},
     *      description="Get Favorito",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Favorito",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Favorito"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Favorito $favorito */
        $favorito = $this->favoritoRepository->find($id);

        if (empty($favorito)) {
            return $this->sendError('Favorito not found');
        }

        return $this->sendResponse($favorito->toArray(), 'Favorito retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFavoritoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/favoritos/{id}",
     *      summary="Update the specified Favorito in storage",
     *      tags={"Favorito"},
     *      description="Update Favorito",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Favorito",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Favorito that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Favorito")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Favorito"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFavoritoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Favorito $favorito */
        $favorito = $this->favoritoRepository->find($id);

        if (empty($favorito)) {
            return $this->sendError('Favorito not found');
        }

        $favorito = $this->favoritoRepository->update($input, $id);

        return $this->sendResponse($favorito->toArray(), 'Favorito updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/favoritos/{id}",
     *      summary="Remove the specified Favorito from storage",
     *      tags={"Favorito"},
     *      description="Delete Favorito",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Favorito",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Favorito $favorito */
        $favorito = $this->favoritoRepository->find($id);

        if (empty($favorito)) {
            return $this->sendError('Favorito not found');
        }

        $favorito->delete();

        return $this->sendSuccess('Favorito deleted successfully');
    }
}
