<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEstudioAPIRequest;
use App\Http\Requests\API\UpdateEstudioAPIRequest;
use App\Models\Estudio;
use App\Repositories\EstudioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EstudioController
 * @package App\Http\Controllers\API
 */

class EstudioAPIController extends AppBaseController
{
    /** @var  EstudioRepository */
    private $estudioRepository;

    public function __construct(EstudioRepository $estudioRepo)
    {
        $this->estudioRepository = $estudioRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/estudios",
     *      summary="Get a listing of the Estudios.",
     *      tags={"Estudio"},
     *      description="Get all Estudios",
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
     *                  @SWG\Items(ref="#/definitions/Estudio")
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
        $estudios = $this->estudioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($estudios->toArray(), 'Estudios retrieved successfully');
    }

    /**
     * @param CreateEstudioAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/estudios",
     *      summary="Store a newly created Estudio in storage",
     *      tags={"Estudio"},
     *      description="Store Estudio",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Estudio that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Estudio")
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
     *                  ref="#/definitions/Estudio"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEstudioAPIRequest $request)
    {
        $input = $request->all();

        $estudio = $this->estudioRepository->create($input);

        return $this->sendResponse($estudio->toArray(), 'Estudio saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/estudios/{id}",
     *      summary="Display the specified Estudio",
     *      tags={"Estudio"},
     *      description="Get Estudio",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Estudio",
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
     *                  ref="#/definitions/Estudio"
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
        /** @var Estudio $estudio */
        $estudio = $this->estudioRepository->find($id);

        if (empty($estudio)) {
            return $this->sendError('Estudio not found');
        }

        return $this->sendResponse($estudio->toArray(), 'Estudio retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEstudioAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/estudios/{id}",
     *      summary="Update the specified Estudio in storage",
     *      tags={"Estudio"},
     *      description="Update Estudio",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Estudio",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Estudio that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Estudio")
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
     *                  ref="#/definitions/Estudio"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEstudioAPIRequest $request)
    {
        $input = $request->all();

        /** @var Estudio $estudio */
        $estudio = $this->estudioRepository->find($id);

        if (empty($estudio)) {
            return $this->sendError('Estudio not found');
        }

        $estudio = $this->estudioRepository->update($input, $id);

        return $this->sendResponse($estudio->toArray(), 'Estudio updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/estudios/{id}",
     *      summary="Remove the specified Estudio from storage",
     *      tags={"Estudio"},
     *      description="Delete Estudio",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Estudio",
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
        /** @var Estudio $estudio */
        $estudio = $this->estudioRepository->find($id);

        if (empty($estudio)) {
            return $this->sendError('Estudio not found');
        }

        $estudio->delete();

        return $this->sendSuccess('Estudio deleted successfully');
    }
}
