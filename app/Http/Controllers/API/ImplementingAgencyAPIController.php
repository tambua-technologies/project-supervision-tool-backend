<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateImplementingAgencyAPIRequest;
use App\Http\Requests\API\UpdateImplementingAgencyAPIRequest;
use App\Models\ImplementingAgency;
use App\Repositories\ImplementingAgencyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ImplementingAgencyController
 * @package App\Http\Controllers\API
 */

class ImplementingAgencyAPIController extends AppBaseController
{
    /** @var  ImplementingAgencyRepository */
    private $implementingAgencyRepository;

    public function __construct(ImplementingAgencyRepository $implementingAgencyRepo)
    {
        $this->implementingAgencyRepository = $implementingAgencyRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/implementing_agencies",
     *      summary="Get a listing of the ImplementingAgencies.",
     *      tags={"ImplementingAgency"},
     *     security={{"Bearer":{}}},
     *      description="Get all ImplementingAgencies",
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
     *                  @SWG\Items(ref="#/definitions/ImplementingAgency")
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
        $implementingAgencies = $this->implementingAgencyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($implementingAgencies->toArray(), 'Implementing Agencies retrieved successfully');
    }

    /**
     * @param CreateImplementingAgencyAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/implementing_agencies",
     *      summary="Store a newly created ImplementingAgency in storage",
     *      tags={"ImplementingAgency"},
     *     security={{"Bearer":{}}},
     *      description="Store ImplementingAgency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ImplementingAgency that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ImplementingAgency")
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
     *                  ref="#/definitions/ImplementingAgency"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateImplementingAgencyAPIRequest $request)
    {
        $input = $request->all();

        $implementingAgency = $this->implementingAgencyRepository->create($input);

        return $this->sendResponse($implementingAgency->toArray(), 'Implementing Agency saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/implementing_agencies/{id}",
     *      summary="Display the specified ImplementingAgency",
     *      tags={"ImplementingAgency"},
     *     security={{"Bearer":{}}},
     *      description="Get ImplementingAgency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ImplementingAgency",
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
     *                  ref="#/definitions/ImplementingAgency"
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
        /** @var ImplementingAgency $implementingAgency */
        $implementingAgency = $this->implementingAgencyRepository->find($id);

        if (empty($implementingAgency)) {
            return $this->sendError('Implementing Agency not found');
        }

        return $this->sendResponse($implementingAgency->toArray(), 'Implementing Agency retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateImplementingAgencyAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/implementing_agencies/{id}",
     *      summary="Update the specified ImplementingAgency in storage",
     *      tags={"ImplementingAgency"},
     *     security={{"Bearer":{}}},
     *      description="Update ImplementingAgency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ImplementingAgency",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ImplementingAgency that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ImplementingAgency")
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
     *                  ref="#/definitions/ImplementingAgency"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateImplementingAgencyAPIRequest $request)
    {
        $input = $request->all();

        /** @var ImplementingAgency $implementingAgency */
        $implementingAgency = $this->implementingAgencyRepository->find($id);

        if (empty($implementingAgency)) {
            return $this->sendError('Implementing Agency not found');
        }

        $implementingAgency = $this->implementingAgencyRepository->update($input, $id);

        return $this->sendResponse($implementingAgency->toArray(), 'ImplementingAgency updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/implementing_agencies/{id}",
     *      summary="Remove the specified ImplementingAgency from storage",
     *      tags={"ImplementingAgency"},
     *     security={{"Bearer":{}}},
     *      description="Delete ImplementingAgency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ImplementingAgency",
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
        /** @var ImplementingAgency $implementingAgency */
        $implementingAgency = $this->implementingAgencyRepository->find($id);

        if (empty($implementingAgency)) {
            return $this->sendError('Implementing Agency not found');
        }

        $implementingAgency->delete();

        return $this->sendSuccess('Implementing Agency deleted successfully');
    }
}
