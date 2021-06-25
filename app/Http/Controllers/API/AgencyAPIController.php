<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAgencyAPIRequest;
use App\Http\Requests\API\UpdateAgencyAPIRequest;
use App\Http\Resources\Agency\AgencyCollection;
use App\Models\Agency;
use App\Repositories\AgencyRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AgencyController
 * @package App\Http\Controllers\API
 */

class AgencyAPIController extends AppBaseController
{
    /** @var  AgencyRepository */
    private AgencyRepository $agencyRepository;

    public function __construct(AgencyRepository $agencyRepo)
    {
        $this->agencyRepository = $agencyRepo;
    }

    /**
     *
     * @SWG\Get(
     *      path="/agencies",
     *      summary="Get a listing of the Agencies.",
     *      tags={"Agency"},
     *     security={{"Bearer":{}}},
     *      description="Get all Agencies",
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
     *                  @SWG\Items(ref="#/definitions/Agency")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      ),
     * )
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $agencies = $this->agencyRepository->paginate($request->get('per_page', 15));

        return $this->sendResponse(new AgencyCollection($agencies), 'Agencies retrieved successfully');
    }

    /**
     * @param CreateAgencyAPIRequest $request
     *
     * @SWG\Post(
     *      path="/agencies",
     *      summary="Store a newly created Agency in storage",
     *      tags={"Agency"},
     *     security={{"Bearer":{}}},
     *      description="Store Agency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Agency that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Agency")
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
     *                  ref="#/definitions/Agency"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @return mixed
     */
    public function store(CreateAgencyAPIRequest $request)
    {
        $input = $request->all();

        $agency = $this->agencyRepository->create($input);

        return $this->sendResponse($agency->toArray(), 'Agency saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/agencies/{id}",
     *      summary="Display the specified Agency",
     *      tags={"Agency"},
     *     security={{"Bearer":{}}},
     *      description="Get Agency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Agency",
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
     *                  ref="#/definitions/Agency"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @return mixed
     */
    public function show(int $id)
    {
        /** @var Agency $agency */
        $agency = $this->agencyRepository->find($id);

        if ($agency === null) {
            return $this->sendError('Agency not found');
        }

        return $this->sendResponse($agency->toArray(), 'Agency retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAgencyAPIRequest $request
     *
     * @SWG\Put(
     *      path="/agencies/{id}",
     *      summary="Update the specified Agency in storage",
     *      tags={"Agency"},
     *     security={{"Bearer":{}}},
     *      description="Update Agency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Agency",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Agency that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Agency")
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
     *                  ref="#/definitions/Agency"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @return JsonResponse
     */
    public function update(int $id, UpdateAgencyAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Agency $agency */
        $agency = $this->agencyRepository->find($id);

        if ($agency === null) {
            return $this->sendError('Agency not found');
        }

        $agency = $this->agencyRepository->update($input, $id);

        return $this->sendResponse($agency->toArray(), 'Agency updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/agencies/{id}",
     *      summary="Remove the specified Agency from storage",
     *      tags={"Agency"},
     *     security={{"Bearer":{}}},
     *      description="Delete Agency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Agency",
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
     * @return mixed
     */
    public function destroy(int $id)
    {
        /** @var Agency $agency */
        $agency = $this->agencyRepository->find($id);

        if ($agency === null) {
            return $this->sendError('Agency not found');
        }

        $agency->delete();

        return $this->sendSuccess('Agency deleted successfully');
    }
}
