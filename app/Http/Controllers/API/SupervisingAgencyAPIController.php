<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSupervisingAgencyAPIRequest;
use App\Http\Requests\API\UpdateSupervisingAgencyAPIRequest;
use App\Models\SupervisingAgency;
use App\Repositories\SupervisingAgencyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SupervisingAgencyController
 * @package App\Http\Controllers\API
 */

class SupervisingAgencyAPIController extends AppBaseController
{
    /** @var  SupervisingAgencyRepository */
    private $supervisingAgencyRepository;

    public function __construct(SupervisingAgencyRepository $supervisingAgencyRepo)
    {
        $this->supervisingAgencyRepository = $supervisingAgencyRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/supervising_agencies",
     *      summary="Get a listing of the SupervisingAgencies.",
     *      tags={"SupervisingAgency"},
     *     security={{"Bearer":{}}},
     *      description="Get all SupervisingAgencies",
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
     *                  @SWG\Items(ref="#/definitions/SupervisingAgency")
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
        $supervisingAgencies = $this->supervisingAgencyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($supervisingAgencies->toArray(), 'Supervising Agencies retrieved successfully');
    }

    /**
     * @param CreateSupervisingAgencyAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/supervising_agencies",
     *      summary="Store a newly created SupervisingAgency in storage",
     *      tags={"SupervisingAgency"},
     *     security={{"Bearer":{}}},
     *      description="Store SupervisingAgency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SupervisingAgency that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SupervisingAgency")
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
     *                  ref="#/definitions/SupervisingAgency"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSupervisingAgencyAPIRequest $request)
    {
        $input = $request->all();

        $supervisingAgency = $this->supervisingAgencyRepository->create($input);

        return $this->sendResponse($supervisingAgency->toArray(), 'Supervising Agency saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/supervising_agencies/{id}",
     *      summary="Display the specified SupervisingAgency",
     *      tags={"SupervisingAgency"},
     *     security={{"Bearer":{}}},
     *      description="Get SupervisingAgency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SupervisingAgency",
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
     *                  ref="#/definitions/SupervisingAgency"
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
        /** @var SupervisingAgency $supervisingAgency */
        $supervisingAgency = $this->supervisingAgencyRepository->find($id);

        if (empty($supervisingAgency)) {
            return $this->sendError('Supervising Agency not found');
        }

        return $this->sendResponse($supervisingAgency->toArray(), 'Supervising Agency retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSupervisingAgencyAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/supervising_agencies/{id}",
     *      summary="Update the specified SupervisingAgency in storage",
     *      tags={"SupervisingAgency"},
     *     security={{"Bearer":{}}},
     *      description="Update SupervisingAgency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SupervisingAgency",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SupervisingAgency that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SupervisingAgency")
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
     *                  ref="#/definitions/SupervisingAgency"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSupervisingAgencyAPIRequest $request)
    {
        $input = $request->all();

        /** @var SupervisingAgency $supervisingAgency */
        $supervisingAgency = $this->supervisingAgencyRepository->find($id);

        if (empty($supervisingAgency)) {
            return $this->sendError('Supervising Agency not found');
        }

        $supervisingAgency = $this->supervisingAgencyRepository->update($input, $id);

        return $this->sendResponse($supervisingAgency->toArray(), 'SupervisingAgency updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/supervising_agencies/{id}",
     *      summary="Remove the specified SupervisingAgency from storage",
     *      tags={"SupervisingAgency"},
     *     security={{"Bearer":{}}},
     *      description="Delete SupervisingAgency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SupervisingAgency",
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
        /** @var SupervisingAgency $supervisingAgency */
        $supervisingAgency = $this->supervisingAgencyRepository->find($id);

        if (empty($supervisingAgency)) {
            return $this->sendError('Supervising Agency not found');
        }

        $supervisingAgency->delete();

        return $this->sendSuccess('Supervising Agency deleted successfully');
    }
}
