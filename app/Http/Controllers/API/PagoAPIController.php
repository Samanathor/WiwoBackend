<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePagoAPIRequest;
use App\Http\Requests\API\UpdatePagoAPIRequest;
use App\Models\Pago;
use App\Repositories\PagoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PagoController
 * @package App\Http\Controllers\API
 */

class PagoAPIController extends AppBaseController
{
    /** @var  PagoRepository */
    private $pagoRepository;

    public function __construct(PagoRepository $pagoRepo)
    {
        $this->pagoRepository = $pagoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/pagos",
     *      summary="Get a listing of the Pagos.",
     *      tags={"Pago"},
     *      description="Get all Pagos",
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
     *                  @SWG\Items(ref="#/definitions/Pago")
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
        $pagos = $this->pagoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pagos->toArray(), 'Pagos retrieved successfully');
    }

    /**
     * @param CreatePagoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/pagos",
     *      summary="Store a newly created Pago in storage",
     *      tags={"Pago"},
     *      description="Store Pago",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Pago that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Pago")
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
     *                  ref="#/definitions/Pago"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePagoAPIRequest $request)
    {
        $input = $request->all();

        $pago = $this->pagoRepository->create($input);

        return $this->sendResponse($pago->toArray(), 'Pago saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/pagos/{id}",
     *      summary="Display the specified Pago",
     *      tags={"Pago"},
     *      description="Get Pago",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pago",
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
     *                  ref="#/definitions/Pago"
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
        /** @var Pago $pago */
        $pago = $this->pagoRepository->find($id);

        if (empty($pago)) {
            return $this->sendError('Pago not found');
        }

        return $this->sendResponse($pago->toArray(), 'Pago retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePagoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/pagos/{id}",
     *      summary="Update the specified Pago in storage",
     *      tags={"Pago"},
     *      description="Update Pago",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pago",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Pago that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Pago")
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
     *                  ref="#/definitions/Pago"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePagoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pago $pago */
        $pago = $this->pagoRepository->find($id);

        if (empty($pago)) {
            return $this->sendError('Pago not found');
        }

        $pago = $this->pagoRepository->update($input, $id);

        return $this->sendResponse($pago->toArray(), 'Pago updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/pagos/{id}",
     *      summary="Remove the specified Pago from storage",
     *      tags={"Pago"},
     *      description="Delete Pago",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pago",
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
        /** @var Pago $pago */
        $pago = $this->pagoRepository->find($id);

        if (empty($pago)) {
            return $this->sendError('Pago not found');
        }

        $pago->delete();

        return $this->sendSuccess('Pago deleted successfully');
    }
}
