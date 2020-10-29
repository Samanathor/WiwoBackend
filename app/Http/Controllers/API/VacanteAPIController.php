<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVacanteAPIRequest;
use App\Http\Requests\API\UpdateVacanteAPIRequest;
use App\Models\Vacante;
use App\Repositories\VacanteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VacanteController
 * @package App\Http\Controllers\API
 */

class VacanteAPIController extends AppBaseController
{
    /** @var  VacanteRepository */
    private $vacanteRepository;

    public function __construct(VacanteRepository $vacanteRepo)
    {
        $this->vacanteRepository = $vacanteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/vacantes",
     *      summary="Get a listing of the Vacantes.",
     *      tags={"Vacante"},
     *      description="Get all Vacantes",
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
     *                  @SWG\Items(ref="#/definitions/Vacante")
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
        $vacantes = $this->vacanteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($vacantes->toArray(), 'Vacantes retrieved successfully');
    }

    /**
     * @param CreateVacanteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/vacantes",
     *      summary="Store a newly created Vacante in storage",
     *      tags={"Vacante"},
     *      description="Store Vacante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Vacante that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Vacante")
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
     *                  ref="#/definitions/Vacante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateVacanteAPIRequest $request)
    {
        $input = $request->all();

        $vacante = $this->vacanteRepository->create($input);

        return $this->sendResponse($vacante->toArray(), 'Vacante saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/vacantes/{id}",
     *      summary="Display the specified Vacante",
     *      tags={"Vacante"},
     *      description="Get Vacante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vacante",
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
     *                  ref="#/definitions/Vacante"
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
        /** @var Vacante $vacante */
        $vacante = $this->vacanteRepository->find($id);

        if (empty($vacante)) {
            return $this->sendError('Vacante not found');
        }

        return $this->sendResponse($vacante->toArray(), 'Vacante retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateVacanteAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/vacantes/{id}",
     *      summary="Update the specified Vacante in storage",
     *      tags={"Vacante"},
     *      description="Update Vacante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vacante",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Vacante that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Vacante")
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
     *                  ref="#/definitions/Vacante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateVacanteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Vacante $vacante */
        $vacante = $this->vacanteRepository->find($id);

        if (empty($vacante)) {
            return $this->sendError('Vacante not found');
        }

        $vacante = $this->vacanteRepository->update($input, $id);

        return $this->sendResponse($vacante->toArray(), 'Vacante updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/vacantes/{id}",
     *      summary="Remove the specified Vacante from storage",
     *      tags={"Vacante"},
     *      description="Delete Vacante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vacante",
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
        /** @var Vacante $vacante */
        $vacante = $this->vacanteRepository->find($id);

        if (empty($vacante)) {
            return $this->sendError('Vacante not found');
        }

        $vacante->delete();

        return $this->sendSuccess('Vacante deleted successfully');
    }
}
