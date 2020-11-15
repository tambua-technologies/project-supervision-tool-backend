<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePhaseAPIRequest;
use App\Http\Requests\API\UpdatePhaseAPIRequest;
use App\Models\Phase;
use App\Repositories\PhaseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PhaseController
 * @package App\Http\Controllers\API
 */

class PhaseAPIController extends AppBaseController
{
    /** @var  PhaseRepository */
    private $phaseRepository;

    public function __construct(PhaseRepository $phaseRepo)
    {
        $this->phaseRepository = $phaseRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/phases",
     *      summary="Get a listing of the Phases.",
     *      tags={"Phase"},
     *     security={{"Bearer":{}}},
     *      description="Get all Phases",
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
     *                  @SWG\Items(ref="#/definitions/Phase")
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
        $phases = $this->phaseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($phases->toArray(), 'Phases retrieved successfully');
    }

    /**
     * @param CreatePhaseAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/phases",
     *      summary="Store a newly created Phase in storage",
     *      tags={"Phase"},
     *     security={{"Bearer":{}}},
     *      description="Store Phase",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Phase that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Phase")
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
     *                  ref="#/definitions/Phase"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePhaseAPIRequest $request)
    {
        $input = $request->all();

        $phase = $this->phaseRepository->create($input);

        return $this->sendResponse($phase->toArray(), 'Phase saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/phases/{id}",
     *      summary="Display the specified Phase",
     *      tags={"Phase"},
     *     security={{"Bearer":{}}},
     *      description="Get Phase",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Phase",
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
     *                  ref="#/definitions/Phase"
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
        /** @var Phase $phase */
        $phase = $this->phaseRepository->find($id);

        if (empty($phase)) {
            return $this->sendError('Phase not found');
        }

        return $this->sendResponse($phase->toArray(), 'Phase retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePhaseAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/phases/{id}",
     *      summary="Update the specified Phase in storage",
     *      tags={"Phase"},
     *     security={{"Bearer":{}}},
     *      description="Update Phase",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Phase",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Phase that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Phase")
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
     *                  ref="#/definitions/Phase"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePhaseAPIRequest $request)
    {
        $input = $request->all();

        /** @var Phase $phase */
        $phase = $this->phaseRepository->find($id);

        if (empty($phase)) {
            return $this->sendError('Phase not found');
        }

        $phase = $this->phaseRepository->update($input, $id);

        return $this->sendResponse($phase->toArray(), 'Phase updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/phases/{id}",
     *      summary="Remove the specified Phase from storage",
     *      tags={"Phase"},
     *     security={{"Bearer":{}}},
     *      description="Delete Phase",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Phase",
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
        /** @var Phase $phase */
        $phase = $this->phaseRepository->find($id);

        if (empty($phase)) {
            return $this->sendError('Phase not found');
        }

        $phase->delete();

        return $this->sendSuccess('Phase deleted successfully');
    }
}
