<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePlanAPIRequest;
use App\Http\Requests\API\UpdatePlanAPIRequest;
use App\Models\Plan;
use App\Repositories\PlanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PlanController
 * @package App\Http\Controllers\API
 */

class PlanAPIController extends AppBaseController
{
    /** @var  PlanRepository */
    private $planRepository;

    public function __construct(PlanRepository $planRepo)
    {
        $this->planRepository = $planRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/planes",
     *      summary="Get a listing of the Planes.",
     *      tags={"Plan"},
     *      description="Get all Planes",
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
     *                  @SWG\Items(ref="#/definitions/Plan")
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
        $planes = $this->planRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($planes->toArray(), 'Planes retrieved successfully');
    }

    /**
     * @param CreatePlanAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/planes",
     *      summary="Store a newly created Plan in storage",
     *      tags={"Plan"},
     *      description="Store Plan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Plan that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Plan")
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
     *                  ref="#/definitions/Plan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePlanAPIRequest $request)
    {
        $input = $request->all();

        $plan = $this->planRepository->create($input);

        return $this->sendResponse($plan->toArray(), 'Plan saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/planes/{id}",
     *      summary="Display the specified Plan",
     *      tags={"Plan"},
     *      description="Get Plan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Plan",
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
     *                  ref="#/definitions/Plan"
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
        /** @var Plan $plan */
        $plan = $this->planRepository->find($id);

        if (empty($plan)) {
            return $this->sendError('Plan not found');
        }

        return $this->sendResponse($plan->toArray(), 'Plan retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePlanAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/planes/{id}",
     *      summary="Update the specified Plan in storage",
     *      tags={"Plan"},
     *      description="Update Plan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Plan",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Plan that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Plan")
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
     *                  ref="#/definitions/Plan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePlanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Plan $plan */
        $plan = $this->planRepository->find($id);

        if (empty($plan)) {
            return $this->sendError('Plan not found');
        }

        $plan = $this->planRepository->update($input, $id);

        return $this->sendResponse($plan->toArray(), 'Plan updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/planes/{id}",
     *      summary="Remove the specified Plan from storage",
     *      tags={"Plan"},
     *      description="Delete Plan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Plan",
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
        /** @var Plan $plan */
        $plan = $this->planRepository->find($id);

        if (empty($plan)) {
            return $this->sendError('Plan not found');
        }

        $plan->delete();

        return $this->sendSuccess('Plan deleted successfully');
    }
}
