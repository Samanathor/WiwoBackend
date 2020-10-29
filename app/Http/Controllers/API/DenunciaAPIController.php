<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDenunciaAPIRequest;
use App\Http\Requests\API\UpdateDenunciaAPIRequest;
use App\Models\Denuncia;
use App\Repositories\DenunciaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DenunciaController
 * @package App\Http\Controllers\API
 */

class DenunciaAPIController extends AppBaseController
{
    /** @var  DenunciaRepository */
    private $denunciaRepository;

    public function __construct(DenunciaRepository $denunciaRepo)
    {
        $this->denunciaRepository = $denunciaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/denuncias",
     *      summary="Get a listing of the Denuncias.",
     *      tags={"Denuncia"},
     *      description="Get all Denuncias",
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
     *                  @SWG\Items(ref="#/definitions/Denuncia")
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
        $denuncias = $this->denunciaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($denuncias->toArray(), 'Denuncias retrieved successfully');
    }

    /**
     * @param CreateDenunciaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/denuncias",
     *      summary="Store a newly created Denuncia in storage",
     *      tags={"Denuncia"},
     *      description="Store Denuncia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Denuncia that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Denuncia")
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
     *                  ref="#/definitions/Denuncia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDenunciaAPIRequest $request)
    {
        $input = $request->all();

        $denuncia = $this->denunciaRepository->create($input);

        return $this->sendResponse($denuncia->toArray(), 'Denuncia saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/denuncias/{id}",
     *      summary="Display the specified Denuncia",
     *      tags={"Denuncia"},
     *      description="Get Denuncia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Denuncia",
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
     *                  ref="#/definitions/Denuncia"
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
        /** @var Denuncia $denuncia */
        $denuncia = $this->denunciaRepository->find($id);

        if (empty($denuncia)) {
            return $this->sendError('Denuncia not found');
        }

        return $this->sendResponse($denuncia->toArray(), 'Denuncia retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateDenunciaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/denuncias/{id}",
     *      summary="Update the specified Denuncia in storage",
     *      tags={"Denuncia"},
     *      description="Update Denuncia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Denuncia",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Denuncia that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Denuncia")
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
     *                  ref="#/definitions/Denuncia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDenunciaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Denuncia $denuncia */
        $denuncia = $this->denunciaRepository->find($id);

        if (empty($denuncia)) {
            return $this->sendError('Denuncia not found');
        }

        $denuncia = $this->denunciaRepository->update($input, $id);

        return $this->sendResponse($denuncia->toArray(), 'Denuncia updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/denuncias/{id}",
     *      summary="Remove the specified Denuncia from storage",
     *      tags={"Denuncia"},
     *      description="Delete Denuncia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Denuncia",
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
        /** @var Denuncia $denuncia */
        $denuncia = $this->denunciaRepository->find($id);

        if (empty($denuncia)) {
            return $this->sendError('Denuncia not found');
        }

        $denuncia->delete();

        return $this->sendSuccess('Denuncia deleted successfully');
    }
}
