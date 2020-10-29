<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePerfilAPIRequest;
use App\Http\Requests\API\UpdatePerfilAPIRequest;
use App\Models\Perfil;
use App\Repositories\PerfilRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PerfilController
 * @package App\Http\Controllers\API
 */

class PerfilAPIController extends AppBaseController
{
    /** @var  PerfilRepository */
    private $perfilRepository;

    public function __construct(PerfilRepository $perfilRepo)
    {
        $this->perfilRepository = $perfilRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/perfiles",
     *      summary="Get a listing of the Perfiles.",
     *      tags={"Perfil"},
     *      description="Get all Perfiles",
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
     *                  @SWG\Items(ref="#/definitions/Perfil")
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
        $perfiles = $this->perfilRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($perfiles->toArray(), 'Perfiles retrieved successfully');
    }

    /**
     * @param CreatePerfilAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/perfiles",
     *      summary="Store a newly created Perfil in storage",
     *      tags={"Perfil"},
     *      description="Store Perfil",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Perfil that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Perfil")
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
     *                  ref="#/definitions/Perfil"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePerfilAPIRequest $request)
    {
        $input = $request->all();

        $perfil = $this->perfilRepository->create($input);

        return $this->sendResponse($perfil->toArray(), 'Perfil saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/perfiles/{id}",
     *      summary="Display the specified Perfil",
     *      tags={"Perfil"},
     *      description="Get Perfil",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Perfil",
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
     *                  ref="#/definitions/Perfil"
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
        /** @var Perfil $perfil */
        $perfil = $this->perfilRepository->find($id);

        if (empty($perfil)) {
            return $this->sendError('Perfil not found');
        }

        return $this->sendResponse($perfil->toArray(), 'Perfil retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePerfilAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/perfiles/{id}",
     *      summary="Update the specified Perfil in storage",
     *      tags={"Perfil"},
     *      description="Update Perfil",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Perfil",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Perfil that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Perfil")
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
     *                  ref="#/definitions/Perfil"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePerfilAPIRequest $request)
    {
        $input = $request->all();

        /** @var Perfil $perfil */
        $perfil = $this->perfilRepository->find($id);

        if (empty($perfil)) {
            return $this->sendError('Perfil not found');
        }

        $perfil = $this->perfilRepository->update($input, $id);

        return $this->sendResponse($perfil->toArray(), 'Perfil updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/perfiles/{id}",
     *      summary="Remove the specified Perfil from storage",
     *      tags={"Perfil"},
     *      description="Delete Perfil",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Perfil",
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
        /** @var Perfil $perfil */
        $perfil = $this->perfilRepository->find($id);

        if (empty($perfil)) {
            return $this->sendError('Perfil not found');
        }

        $perfil->delete();

        return $this->sendSuccess('Perfil deleted successfully');
    }
}
