<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateExperienciaAPIRequest;
use App\Http\Requests\API\UpdateExperienciaAPIRequest;
use App\Models\Experiencia;
use App\Repositories\ExperienciaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ExperienciaController
 * @package App\Http\Controllers\API
 */

class ExperienciaAPIController extends AppBaseController
{
    /** @var  ExperienciaRepository */
    private $experienciaRepository;

    public function __construct(ExperienciaRepository $experienciaRepo)
    {
        $this->experienciaRepository = $experienciaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/experiencias",
     *      summary="Get a listing of the Experiencias.",
     *      tags={"Experiencia"},
     *      description="Get all Experiencias",
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
     *                  @SWG\Items(ref="#/definitions/Experiencia")
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
        $experiencias = $this->experienciaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($experiencias->toArray(), 'Experiencias retrieved successfully');
    }

    /**
     * @param CreateExperienciaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/experiencias",
     *      summary="Store a newly created Experiencia in storage",
     *      tags={"Experiencia"},
     *      description="Store Experiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Experiencia that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Experiencia")
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
     *                  ref="#/definitions/Experiencia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateExperienciaAPIRequest $request)
    {
        $input = $request->all();

        $experiencia = $this->experienciaRepository->create($input);

        return $this->sendResponse($experiencia->toArray(), 'Experiencia saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/experiencias/{id}",
     *      summary="Display the specified Experiencia",
     *      tags={"Experiencia"},
     *      description="Get Experiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Experiencia",
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
     *                  ref="#/definitions/Experiencia"
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
        /** @var Experiencia $experiencia */
        $experiencia = $this->experienciaRepository->find($id);

        if (empty($experiencia)) {
            return $this->sendError('Experiencia not found');
        }

        return $this->sendResponse($experiencia->toArray(), 'Experiencia retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateExperienciaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/experiencias/{id}",
     *      summary="Update the specified Experiencia in storage",
     *      tags={"Experiencia"},
     *      description="Update Experiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Experiencia",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Experiencia that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Experiencia")
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
     *                  ref="#/definitions/Experiencia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateExperienciaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Experiencia $experiencia */
        $experiencia = $this->experienciaRepository->find($id);

        if (empty($experiencia)) {
            return $this->sendError('Experiencia not found');
        }

        $experiencia = $this->experienciaRepository->update($input, $id);

        return $this->sendResponse($experiencia->toArray(), 'Experiencia updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/experiencias/{id}",
     *      summary="Remove the specified Experiencia from storage",
     *      tags={"Experiencia"},
     *      description="Delete Experiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Experiencia",
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
        /** @var Experiencia $experiencia */
        $experiencia = $this->experienciaRepository->find($id);

        if (empty($experiencia)) {
            return $this->sendError('Experiencia not found');
        }

        $experiencia->delete();

        return $this->sendSuccess('Experiencia deleted successfully');
    }
}
