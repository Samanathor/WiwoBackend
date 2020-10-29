<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePlanUsuarioAPIRequest;
use App\Http\Requests\API\UpdatePlanUsuarioAPIRequest;
use App\Models\PlanUsuario;
use App\Repositories\PlanUsuarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PlanUsuarioController
 * @package App\Http\Controllers\API
 */

class PlanUsuarioAPIController extends AppBaseController
{
    /** @var  PlanUsuarioRepository */
    private $planUsuarioRepository;

    public function __construct(PlanUsuarioRepository $planUsuarioRepo)
    {
        $this->planUsuarioRepository = $planUsuarioRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/planesUsuario",
     *      summary="Get a listing of the PlanesUsuario.",
     *      tags={"PlanUsuario"},
     *      description="Get all PlanesUsuario",
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
     *                  @SWG\Items(ref="#/definitions/PlanUsuario")
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
        $planesUsuario = $this->planUsuarioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($planesUsuario->toArray(), 'Planes Usuario retrieved successfully');
    }

    /**
     * @param CreatePlanUsuarioAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/planesUsuario",
     *      summary="Store a newly created PlanUsuario in storage",
     *      tags={"PlanUsuario"},
     *      description="Store PlanUsuario",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PlanUsuario that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PlanUsuario")
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
     *                  ref="#/definitions/PlanUsuario"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePlanUsuarioAPIRequest $request)
    {
        $input = $request->all();

        $planUsuario = $this->planUsuarioRepository->create($input);

        return $this->sendResponse($planUsuario->toArray(), 'Plan Usuario saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/planesUsuario/{id}",
     *      summary="Display the specified PlanUsuario",
     *      tags={"PlanUsuario"},
     *      description="Get PlanUsuario",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PlanUsuario",
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
     *                  ref="#/definitions/PlanUsuario"
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
        /** @var PlanUsuario $planUsuario */
        $planUsuario = $this->planUsuarioRepository->find($id);

        if (empty($planUsuario)) {
            return $this->sendError('Plan Usuario not found');
        }

        return $this->sendResponse($planUsuario->toArray(), 'Plan Usuario retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePlanUsuarioAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/planesUsuario/{id}",
     *      summary="Update the specified PlanUsuario in storage",
     *      tags={"PlanUsuario"},
     *      description="Update PlanUsuario",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PlanUsuario",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PlanUsuario that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PlanUsuario")
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
     *                  ref="#/definitions/PlanUsuario"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePlanUsuarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var PlanUsuario $planUsuario */
        $planUsuario = $this->planUsuarioRepository->find($id);

        if (empty($planUsuario)) {
            return $this->sendError('Plan Usuario not found');
        }

        $planUsuario = $this->planUsuarioRepository->update($input, $id);

        return $this->sendResponse($planUsuario->toArray(), 'PlanUsuario updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/planesUsuario/{id}",
     *      summary="Remove the specified PlanUsuario from storage",
     *      tags={"PlanUsuario"},
     *      description="Delete PlanUsuario",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PlanUsuario",
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
        /** @var PlanUsuario $planUsuario */
        $planUsuario = $this->planUsuarioRepository->find($id);

        if (empty($planUsuario)) {
            return $this->sendError('Plan Usuario not found');
        }

        $planUsuario->delete();

        return $this->sendSuccess('Plan Usuario deleted successfully');
    }
}
