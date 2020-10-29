<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePostulacionAPIRequest;
use App\Http\Requests\API\UpdatePostulacionAPIRequest;
use App\Models\Postulacion;
use App\Repositories\PostulacionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PostulacionController
 * @package App\Http\Controllers\API
 */

class PostulacionAPIController extends AppBaseController
{
    /** @var  PostulacionRepository */
    private $postulacionRepository;

    public function __construct(PostulacionRepository $postulacionRepo)
    {
        $this->postulacionRepository = $postulacionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/postulaciones",
     *      summary="Get a listing of the Postulaciones.",
     *      tags={"Postulacion"},
     *      description="Get all Postulaciones",
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
     *                  @SWG\Items(ref="#/definitions/Postulacion")
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
        $postulaciones = $this->postulacionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($postulaciones->toArray(), 'Postulaciones retrieved successfully');
    }

    /**
     * @param CreatePostulacionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/postulaciones",
     *      summary="Store a newly created Postulacion in storage",
     *      tags={"Postulacion"},
     *      description="Store Postulacion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Postulacion that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Postulacion")
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
     *                  ref="#/definitions/Postulacion"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePostulacionAPIRequest $request)
    {
        $input = $request->all();

        $postulacion = $this->postulacionRepository->create($input);

        return $this->sendResponse($postulacion->toArray(), 'Postulacion saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/postulaciones/{id}",
     *      summary="Display the specified Postulacion",
     *      tags={"Postulacion"},
     *      description="Get Postulacion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Postulacion",
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
     *                  ref="#/definitions/Postulacion"
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
        /** @var Postulacion $postulacion */
        $postulacion = $this->postulacionRepository->find($id);

        if (empty($postulacion)) {
            return $this->sendError('Postulacion not found');
        }

        return $this->sendResponse($postulacion->toArray(), 'Postulacion retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePostulacionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/postulaciones/{id}",
     *      summary="Update the specified Postulacion in storage",
     *      tags={"Postulacion"},
     *      description="Update Postulacion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Postulacion",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Postulacion that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Postulacion")
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
     *                  ref="#/definitions/Postulacion"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePostulacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Postulacion $postulacion */
        $postulacion = $this->postulacionRepository->find($id);

        if (empty($postulacion)) {
            return $this->sendError('Postulacion not found');
        }

        $postulacion = $this->postulacionRepository->update($input, $id);

        return $this->sendResponse($postulacion->toArray(), 'Postulacion updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/postulaciones/{id}",
     *      summary="Remove the specified Postulacion from storage",
     *      tags={"Postulacion"},
     *      description="Delete Postulacion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Postulacion",
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
        /** @var Postulacion $postulacion */
        $postulacion = $this->postulacionRepository->find($id);

        if (empty($postulacion)) {
            return $this->sendError('Postulacion not found');
        }

        $postulacion->delete();

        return $this->sendSuccess('Postulacion deleted successfully');
    }
}
