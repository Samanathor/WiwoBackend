<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmpresaAPIRequest;
use App\Http\Requests\API\UpdateEmpresaAPIRequest;
use App\Models\Empresa;
use App\Repositories\EmpresaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EmpresaController
 * @package App\Http\Controllers\API
 */

class EmpresaAPIController extends AppBaseController
{
    /** @var  EmpresaRepository */
    private $empresaRepository;

    public function __construct(EmpresaRepository $empresaRepo)
    {
        $this->empresaRepository = $empresaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/empresas",
     *      summary="Get a listing of the Empresas.",
     *      tags={"Empresa"},
     *      description="Get all Empresas",
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
     *                  @SWG\Items(ref="#/definitions/Empresa")
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
        $empresas = $this->empresaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($empresas->toArray(), 'Empresas retrieved successfully');
    }

    /**
     * @param CreateEmpresaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/empresas",
     *      summary="Store a newly created Empresa in storage",
     *      tags={"Empresa"},
     *      description="Store Empresa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Empresa that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Empresa")
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
     *                  ref="#/definitions/Empresa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEmpresaAPIRequest $request)
    {
        $input = $request->all();

        $empresa = $this->empresaRepository->create($input);

        return $this->sendResponse($empresa->toArray(), 'Empresa saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/empresas/{id}",
     *      summary="Display the specified Empresa",
     *      tags={"Empresa"},
     *      description="Get Empresa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Empresa",
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
     *                  ref="#/definitions/Empresa"
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
        /** @var Empresa $empresa */
        $empresa = $this->empresaRepository->find($id);

        if (empty($empresa)) {
            return $this->sendError('Empresa not found');
        }

        return $this->sendResponse($empresa->toArray(), 'Empresa retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEmpresaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/empresas/{id}",
     *      summary="Update the specified Empresa in storage",
     *      tags={"Empresa"},
     *      description="Update Empresa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Empresa",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Empresa that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Empresa")
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
     *                  ref="#/definitions/Empresa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEmpresaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Empresa $empresa */
        $empresa = $this->empresaRepository->find($id);

        if (empty($empresa)) {
            return $this->sendError('Empresa not found');
        }

        $empresa = $this->empresaRepository->update($input, $id);

        return $this->sendResponse($empresa->toArray(), 'Empresa updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/empresas/{id}",
     *      summary="Remove the specified Empresa from storage",
     *      tags={"Empresa"},
     *      description="Delete Empresa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Empresa",
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
        /** @var Empresa $empresa */
        $empresa = $this->empresaRepository->find($id);

        if (empty($empresa)) {
            return $this->sendError('Empresa not found');
        }

        $empresa->delete();

        return $this->sendSuccess('Empresa deleted successfully');
    }
}
