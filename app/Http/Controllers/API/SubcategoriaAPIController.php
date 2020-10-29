<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubcategoriaAPIRequest;
use App\Http\Requests\API\UpdateSubcategoriaAPIRequest;
use App\Models\Subcategoria;
use App\Repositories\SubcategoriaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubcategoriaController
 * @package App\Http\Controllers\API
 */

class SubcategoriaAPIController extends AppBaseController
{
    /** @var  SubcategoriaRepository */
    private $subcategoriaRepository;

    public function __construct(SubcategoriaRepository $subcategoriaRepo)
    {
        $this->subcategoriaRepository = $subcategoriaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/subcategorias",
     *      summary="Get a listing of the Subcategorias.",
     *      tags={"Subcategoria"},
     *      description="Get all Subcategorias",
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
     *                  @SWG\Items(ref="#/definitions/Subcategoria")
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
        $subcategorias = $this->subcategoriaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subcategorias->toArray(), 'Subcategorias retrieved successfully');
    }

    /**
     * @param CreateSubcategoriaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/subcategorias",
     *      summary="Store a newly created Subcategoria in storage",
     *      tags={"Subcategoria"},
     *      description="Store Subcategoria",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Subcategoria that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Subcategoria")
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
     *                  ref="#/definitions/Subcategoria"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSubcategoriaAPIRequest $request)
    {
        $input = $request->all();

        $subcategoria = $this->subcategoriaRepository->create($input);

        return $this->sendResponse($subcategoria->toArray(), 'Subcategoria saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/subcategorias/{id}",
     *      summary="Display the specified Subcategoria",
     *      tags={"Subcategoria"},
     *      description="Get Subcategoria",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Subcategoria",
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
     *                  ref="#/definitions/Subcategoria"
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
        /** @var Subcategoria $subcategoria */
        $subcategoria = $this->subcategoriaRepository->find($id);

        if (empty($subcategoria)) {
            return $this->sendError('Subcategoria not found');
        }

        return $this->sendResponse($subcategoria->toArray(), 'Subcategoria retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSubcategoriaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/subcategorias/{id}",
     *      summary="Update the specified Subcategoria in storage",
     *      tags={"Subcategoria"},
     *      description="Update Subcategoria",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Subcategoria",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Subcategoria that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Subcategoria")
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
     *                  ref="#/definitions/Subcategoria"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSubcategoriaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Subcategoria $subcategoria */
        $subcategoria = $this->subcategoriaRepository->find($id);

        if (empty($subcategoria)) {
            return $this->sendError('Subcategoria not found');
        }

        $subcategoria = $this->subcategoriaRepository->update($input, $id);

        return $this->sendResponse($subcategoria->toArray(), 'Subcategoria updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/subcategorias/{id}",
     *      summary="Remove the specified Subcategoria from storage",
     *      tags={"Subcategoria"},
     *      description="Delete Subcategoria",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Subcategoria",
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
        /** @var Subcategoria $subcategoria */
        $subcategoria = $this->subcategoriaRepository->find($id);

        if (empty($subcategoria)) {
            return $this->sendError('Subcategoria not found');
        }

        $subcategoria->delete();

        return $this->sendSuccess('Subcategoria deleted successfully');
    }
}
