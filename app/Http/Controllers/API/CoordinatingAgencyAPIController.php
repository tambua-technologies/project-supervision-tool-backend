<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCoordinatingAgencyAPIRequest;
use App\Http\Requests\API\UpdateCoordinatingAgencyAPIRequest;
use App\Models\CoordinatingAgency;
use App\Repositories\CoordinatingAgencyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CoordinatingAgencyController
 * @package App\Http\Controllers\API
 */

class CoordinatingAgencyAPIController extends AppBaseController
{
    /** @var  CoordinatingAgencyRepository */
    private $coordinatingAgencyRepository;

    public function __construct(CoordinatingAgencyRepository $coordinatingAgencyRepo)
    {
        $this->coordinatingAgencyRepository = $coordinatingAgencyRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/coordinating_agencies",
     *      summary="Get a listing of the CoordinatingAgencies.",
     *      tags={"CoordinatingAgency"},
     *      description="Get all CoordinatingAgencies",
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
     *                  @SWG\Items(ref="#/definitions/CoordinatingAgency")
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
        $coordinatingAgencies = $this->coordinatingAgencyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($coordinatingAgencies->toArray(), 'Coordinating Agencies retrieved successfully');
    }

    /**
     * @param CreateCoordinatingAgencyAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/coordinating_agencies",
     *      summary="Store a newly created CoordinatingAgency in storage",
     *      tags={"CoordinatingAgency"},
     *      description="Store CoordinatingAgency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CoordinatingAgency that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CoordinatingAgency")
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
     *                  ref="#/definitions/CoordinatingAgency"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCoordinatingAgencyAPIRequest $request)
    {
        $input = $request->all();

        $coordinatingAgency = $this->coordinatingAgencyRepository->create($input);

        return $this->sendResponse($coordinatingAgency->toArray(), 'Coordinating Agency saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/coordinating_agencies/{id}",
     *      summary="Display the specified CoordinatingAgency",
     *      tags={"CoordinatingAgency"},
     *      description="Get CoordinatingAgency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CoordinatingAgency",
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
     *                  ref="#/definitions/CoordinatingAgency"
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
        /** @var CoordinatingAgency $coordinatingAgency */
        $coordinatingAgency = $this->coordinatingAgencyRepository->find($id);

        if (empty($coordinatingAgency)) {
            return $this->sendError('Coordinating Agency not found');
        }

        return $this->sendResponse($coordinatingAgency->toArray(), 'Coordinating Agency retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCoordinatingAgencyAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/coordinating_agencies/{id}",
     *      summary="Update the specified CoordinatingAgency in storage",
     *      tags={"CoordinatingAgency"},
     *      description="Update CoordinatingAgency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CoordinatingAgency",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CoordinatingAgency that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CoordinatingAgency")
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
     *                  ref="#/definitions/CoordinatingAgency"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCoordinatingAgencyAPIRequest $request)
    {
        $input = $request->all();

        /** @var CoordinatingAgency $coordinatingAgency */
        $coordinatingAgency = $this->coordinatingAgencyRepository->find($id);

        if (empty($coordinatingAgency)) {
            return $this->sendError('Coordinating Agency not found');
        }

        $coordinatingAgency = $this->coordinatingAgencyRepository->update($input, $id);

        return $this->sendResponse($coordinatingAgency->toArray(), 'CoordinatingAgency updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/coordinating_agencies/{id}",
     *      summary="Remove the specified CoordinatingAgency from storage",
     *      tags={"CoordinatingAgency"},
     *      description="Delete CoordinatingAgency",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CoordinatingAgency",
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
        /** @var CoordinatingAgency $coordinatingAgency */
        $coordinatingAgency = $this->coordinatingAgencyRepository->find($id);

        if (empty($coordinatingAgency)) {
            return $this->sendError('Coordinating Agency not found');
        }

        $coordinatingAgency->delete();

        return $this->sendSuccess('Coordinating Agency deleted successfully');
    }
}
