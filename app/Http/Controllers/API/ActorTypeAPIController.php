<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateActorTypeAPIRequest;
use App\Http\Requests\API\UpdateActorTypeAPIRequest;
use App\Models\ActorType;
use App\Repositories\ActorTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ActorTypeController
 * @package App\Http\Controllers\API
 */

class ActorTypeAPIController extends AppBaseController
{
    /** @var  ActorTypeRepository */
    private $actorTypeRepository;

    public function __construct(ActorTypeRepository $actorTypeRepo)
    {
        $this->actorTypeRepository = $actorTypeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/actor_types",
     *      summary="Get a listing of the ActorTypes.",
     *      tags={"ActorType"},
     *      description="Get all ActorTypes",
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
     *                  @SWG\Items(ref="#/definitions/ActorType")
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
        $actorTypes = $this->actorTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($actorTypes->toArray(), 'Actor Types retrieved successfully');
    }

    /**
     * @param CreateActorTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/actor_types",
     *      summary="Store a newly created ActorType in storage",
     *      tags={"ActorType"},
     *      description="Store ActorType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ActorType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ActorType")
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
     *                  ref="#/definitions/ActorType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateActorTypeAPIRequest $request)
    {
        $input = $request->all();

        $actorType = $this->actorTypeRepository->create($input);

        return $this->sendResponse($actorType->toArray(), 'Actor Type saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/actor_types/{id}",
     *      summary="Display the specified ActorType",
     *      tags={"ActorType"},
     *      description="Get ActorType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ActorType",
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
     *                  ref="#/definitions/ActorType"
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
        /** @var ActorType $actorType */
        $actorType = $this->actorTypeRepository->find($id);

        if (empty($actorType)) {
            return $this->sendError('Actor Type not found');
        }

        return $this->sendResponse($actorType->toArray(), 'Actor Type retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateActorTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/actor_types/{id}",
     *      summary="Update the specified ActorType in storage",
     *      tags={"ActorType"},
     *      description="Update ActorType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ActorType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ActorType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ActorType")
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
     *                  ref="#/definitions/ActorType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateActorTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var ActorType $actorType */
        $actorType = $this->actorTypeRepository->find($id);

        if (empty($actorType)) {
            return $this->sendError('Actor Type not found');
        }

        $actorType = $this->actorTypeRepository->update($input, $id);

        return $this->sendResponse($actorType->toArray(), 'ActorType updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/actor_types/{id}",
     *      summary="Remove the specified ActorType from storage",
     *      tags={"ActorType"},
     *      description="Delete ActorType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ActorType",
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
        /** @var ActorType $actorType */
        $actorType = $this->actorTypeRepository->find($id);

        if (empty($actorType)) {
            return $this->sendError('Actor Type not found');
        }

        $actorType->delete();

        return $this->sendSuccess('Actor Type deleted successfully');
    }
}
