<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReferenciaAPIRequest;
use App\Http\Requests\API\UpdateReferenciaAPIRequest;
use App\Models\Referencia;
use App\Repositories\ReferenciaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ReferenciaController
 * @package App\Http\Controllers\API
 */

class ReferenciaAPIController extends AppBaseController
{
    /** @var  ReferenciaRepository */
    private $referenciaRepository;

    public function __construct(ReferenciaRepository $referenciaRepo)
    {
        $this->referenciaRepository = $referenciaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/referencias",
     *      summary="Get a listing of the Referencias.",
     *      tags={"Referencia"},
     *      description="Get all Referencias",
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
     *                  @SWG\Items(ref="#/definitions/Referencia")
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
        $referencias = $this->referenciaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($referencias->toArray(), 'Referencias retrieved successfully');
    }

    /**
     * @param CreateReferenciaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/referencias",
     *      summary="Store a newly created Referencia in storage",
     *      tags={"Referencia"},
     *      description="Store Referencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Referencia that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Referencia")
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
     *                  ref="#/definitions/Referencia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateReferenciaAPIRequest $request)
    {
        $input = $request->all();

        $referencia = $this->referenciaRepository->create($input);

        return $this->sendResponse($referencia->toArray(), 'Referencia saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/referencias/{id}",
     *      summary="Display the specified Referencia",
     *      tags={"Referencia"},
     *      description="Get Referencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Referencia",
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
     *                  ref="#/definitions/Referencia"
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
        /** @var Referencia $referencia */
        $referencia = $this->referenciaRepository->find($id);

        if (empty($referencia)) {
            return $this->sendError('Referencia not found');
        }

        return $this->sendResponse($referencia->toArray(), 'Referencia retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateReferenciaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/referencias/{id}",
     *      summary="Update the specified Referencia in storage",
     *      tags={"Referencia"},
     *      description="Update Referencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Referencia",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Referencia that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Referencia")
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
     *                  ref="#/definitions/Referencia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateReferenciaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Referencia $referencia */
        $referencia = $this->referenciaRepository->find($id);

        if (empty($referencia)) {
            return $this->sendError('Referencia not found');
        }

        $referencia = $this->referenciaRepository->update($input, $id);

        return $this->sendResponse($referencia->toArray(), 'Referencia updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/referencias/{id}",
     *      summary="Remove the specified Referencia from storage",
     *      tags={"Referencia"},
     *      description="Delete Referencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Referencia",
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
        /** @var Referencia $referencia */
        $referencia = $this->referenciaRepository->find($id);

        if (empty($referencia)) {
            return $this->sendError('Referencia not found');
        }

        $referencia->delete();

        return $this->sendSuccess('Referencia deleted successfully');
    }
}
