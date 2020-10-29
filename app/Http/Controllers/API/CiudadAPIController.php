<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCiudadAPIRequest;
use App\Http\Requests\API\UpdateCiudadAPIRequest;
use App\Models\Ciudad;
use App\Repositories\CiudadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CiudadController
 * @package App\Http\Controllers\API
 */

class CiudadAPIController extends AppBaseController
{
    /** @var  CiudadRepository */
    private $ciudadRepository;

    public function __construct(CiudadRepository $ciudadRepo)
    {
        $this->ciudadRepository = $ciudadRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/ciudades",
     *      summary="Get a listing of the Ciudades.",
     *      tags={"Ciudad"},
     *      description="Get all Ciudades",
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
     *                  @SWG\Items(ref="#/definitions/Ciudad")
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
        $ciudades = $this->ciudadRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ciudades->toArray(), 'Ciudades retrieved successfully');
    }

    /**
     * @param CreateCiudadAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/ciudades",
     *      summary="Store a newly created Ciudad in storage",
     *      tags={"Ciudad"},
     *      description="Store Ciudad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Ciudad that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Ciudad")
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
     *                  ref="#/definitions/Ciudad"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCiudadAPIRequest $request)
    {
        $input = $request->all();

        $ciudad = $this->ciudadRepository->create($input);

        return $this->sendResponse($ciudad->toArray(), 'Ciudad saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/ciudades/{id}",
     *      summary="Display the specified Ciudad",
     *      tags={"Ciudad"},
     *      description="Get Ciudad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ciudad",
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
     *                  ref="#/definitions/Ciudad"
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
        /** @var Ciudad $ciudad */
        $ciudad = $this->ciudadRepository->find($id);

        if (empty($ciudad)) {
            return $this->sendError('Ciudad not found');
        }

        return $this->sendResponse($ciudad->toArray(), 'Ciudad retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCiudadAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/ciudades/{id}",
     *      summary="Update the specified Ciudad in storage",
     *      tags={"Ciudad"},
     *      description="Update Ciudad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ciudad",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Ciudad that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Ciudad")
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
     *                  ref="#/definitions/Ciudad"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCiudadAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ciudad $ciudad */
        $ciudad = $this->ciudadRepository->find($id);

        if (empty($ciudad)) {
            return $this->sendError('Ciudad not found');
        }

        $ciudad = $this->ciudadRepository->update($input, $id);

        return $this->sendResponse($ciudad->toArray(), 'Ciudad updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ciudades/{id}",
     *      summary="Remove the specified Ciudad from storage",
     *      tags={"Ciudad"},
     *      description="Delete Ciudad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ciudad",
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
        /** @var Ciudad $ciudad */
        $ciudad = $this->ciudadRepository->find($id);

        if (empty($ciudad)) {
            return $this->sendError('Ciudad not found');
        }

        $ciudad->delete();

        return $this->sendSuccess('Ciudad deleted successfully');
    }
}
