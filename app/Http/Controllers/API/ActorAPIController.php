<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateActorAPIRequest;
use App\Http\Requests\API\UpdateActorAPIRequest;
use App\Models\Actor;
use App\Repositories\ActorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ActorController
 * @package App\Http\Controllers\API
 */

class ActorAPIController extends AppBaseController
{
    /** @var  ActorRepository */
    private $implementingPartnerRepository;

    public function __construct(ActorRepository $implementingPartnerRepo)
    {
        $this->implementingPartnerRepository = $implementingPartnerRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/actors",
     *      summary="Get a listing of the Actors.",
     *      tags={"Actor"},
     *      description="Get all Actors",
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
     *                  @SWG\Items(ref="#/definitions/Actor")
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
        $agencies = $this->implementingPartnerRepository->paginate($request->get('per_page', 15));

        return $this->sendResponse($agencies->toArray(), 'Actors retrieved successfully');
    }

    /**
     * @param CreateActorAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/actors",
     *      summary="Store a newly created Actor in storage",
     *      tags={"Actor"},
     *      description="Store Actor",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Actor that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Actor")
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
     *                  ref="#/definitions/Actor"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateActorAPIRequest $request)
    {
        $input = $request->all();

        $implementingPartner = $this->implementingPartnerRepository->create($input);

        return $this->sendResponse($implementingPartner->toArray(), 'Actor saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/actors/{id}",
     *      summary="Display the specified Actor",
     *      tags={"Actor"},
     *      description="Get Actor",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Actor",
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
     *                  ref="#/definitions/Actor"
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
        /** @var Actor $implementingPartner */
        $implementingPartner = $this->implementingPartnerRepository->find($id);

        if (empty($implementingPartner)) {
            return $this->sendError('Actor not found');
        }

        return $this->sendResponse($implementingPartner->toArray(), 'Actor retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateActorAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/actors/{id}",
     *      summary="Update the specified Actor in storage",
     *      tags={"Actor"},
     *      description="Update Actor",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Actor",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Actor that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Actor")
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
     *                  ref="#/definitions/Actor"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateActorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Actor $implementingPartner */
        $implementingPartner = $this->implementingPartnerRepository->find($id);

        if (empty($implementingPartner)) {
            return $this->sendError('Actor not found');
        }

        $implementingPartner = $this->implementingPartnerRepository->update($input, $id);

        return $this->sendResponse($implementingPartner->toArray(), 'Actor updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/actors/{id}",
     *      summary="Remove the specified Actor from storage",
     *      tags={"Actor"},
     *      description="Delete Actor",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Actor",
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
        /** @var Actor $implementingPartner */
        $implementingPartner = $this->implementingPartnerRepository->find($id);

        if (empty($implementingPartner)) {
            return $this->sendError('Actor not found');
        }

        $implementingPartner->delete();

        return $this->sendSuccess('Actor deleted successfully');
    }
}
