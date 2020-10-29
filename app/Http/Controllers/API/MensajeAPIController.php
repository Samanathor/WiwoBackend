<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMensajeAPIRequest;
use App\Http\Requests\API\UpdateMensajeAPIRequest;
use App\Models\Mensaje;
use App\Repositories\MensajeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MensajeController
 * @package App\Http\Controllers\API
 */

class MensajeAPIController extends AppBaseController
{
    /** @var  MensajeRepository */
    private $mensajeRepository;

    public function __construct(MensajeRepository $mensajeRepo)
    {
        $this->mensajeRepository = $mensajeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/mensajes",
     *      summary="Get a listing of the Mensajes.",
     *      tags={"Mensaje"},
     *      description="Get all Mensajes",
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
     *                  @SWG\Items(ref="#/definitions/Mensaje")
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
        $mensajes = $this->mensajeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($mensajes->toArray(), 'Mensajes retrieved successfully');
    }

    /**
     * @param CreateMensajeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/mensajes",
     *      summary="Store a newly created Mensaje in storage",
     *      tags={"Mensaje"},
     *      description="Store Mensaje",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Mensaje that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Mensaje")
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
     *                  ref="#/definitions/Mensaje"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMensajeAPIRequest $request)
    {
        $input = $request->all();

        $mensaje = $this->mensajeRepository->create($input);

        return $this->sendResponse($mensaje->toArray(), 'Mensaje saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/mensajes/{id}",
     *      summary="Display the specified Mensaje",
     *      tags={"Mensaje"},
     *      description="Get Mensaje",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Mensaje",
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
     *                  ref="#/definitions/Mensaje"
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
        /** @var Mensaje $mensaje */
        $mensaje = $this->mensajeRepository->find($id);

        if (empty($mensaje)) {
            return $this->sendError('Mensaje not found');
        }

        return $this->sendResponse($mensaje->toArray(), 'Mensaje retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMensajeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/mensajes/{id}",
     *      summary="Update the specified Mensaje in storage",
     *      tags={"Mensaje"},
     *      description="Update Mensaje",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Mensaje",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Mensaje that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Mensaje")
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
     *                  ref="#/definitions/Mensaje"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMensajeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Mensaje $mensaje */
        $mensaje = $this->mensajeRepository->find($id);

        if (empty($mensaje)) {
            return $this->sendError('Mensaje not found');
        }

        $mensaje = $this->mensajeRepository->update($input, $id);

        return $this->sendResponse($mensaje->toArray(), 'Mensaje updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/mensajes/{id}",
     *      summary="Remove the specified Mensaje from storage",
     *      tags={"Mensaje"},
     *      description="Delete Mensaje",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Mensaje",
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
        /** @var Mensaje $mensaje */
        $mensaje = $this->mensajeRepository->find($id);

        if (empty($mensaje)) {
            return $this->sendError('Mensaje not found');
        }

        $mensaje->delete();

        return $this->sendSuccess('Mensaje deleted successfully');
    }
}
