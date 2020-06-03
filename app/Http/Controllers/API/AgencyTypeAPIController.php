<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAgencyTypeAPIRequest;
use App\Http\Requests\API\UpdateAgencyTypeAPIRequest;
use App\Models\AgencyType;
use App\Repositories\AgencyTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AgencyTypeController
 * @package App\Http\Controllers\API
 */

class AgencyTypeAPIController extends AppBaseController
{
    /** @var  AgencyTypeRepository */
    private $agencyTypeRepository;

    public function __construct(AgencyTypeRepository $agencyTypeRepo)
    {
        $this->agencyTypeRepository = $agencyTypeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/agencyTypes",
     *      summary="Get a listing of the AgencyTypes.",
     *      tags={"AgencyType"},
     *      description="Get all AgencyTypes",
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
     *                  @SWG\Items(ref="#/definitions/AgencyType")
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
        $agencyTypes = $this->agencyTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($agencyTypes->toArray(), 'Agency Types retrieved successfully');
    }

    /**
     * @param CreateAgencyTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/agencyTypes",
     *      summary="Store a newly created AgencyType in storage",
     *      tags={"AgencyType"},
     *      description="Store AgencyType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AgencyType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AgencyType")
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
     *                  ref="#/definitions/AgencyType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAgencyTypeAPIRequest $request)
    {
        $input = $request->all();

        $agencyType = $this->agencyTypeRepository->create($input);

        return $this->sendResponse($agencyType->toArray(), 'Agency Type saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/agencyTypes/{id}",
     *      summary="Display the specified AgencyType",
     *      tags={"AgencyType"},
     *      description="Get AgencyType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AgencyType",
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
     *                  ref="#/definitions/AgencyType"
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
        /** @var AgencyType $agencyType */
        $agencyType = $this->agencyTypeRepository->find($id);

        if (empty($agencyType)) {
            return $this->sendError('Agency Type not found');
        }

        return $this->sendResponse($agencyType->toArray(), 'Agency Type retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAgencyTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/agencyTypes/{id}",
     *      summary="Update the specified AgencyType in storage",
     *      tags={"AgencyType"},
     *      description="Update AgencyType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AgencyType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AgencyType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AgencyType")
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
     *                  ref="#/definitions/AgencyType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAgencyTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var AgencyType $agencyType */
        $agencyType = $this->agencyTypeRepository->find($id);

        if (empty($agencyType)) {
            return $this->sendError('Agency Type not found');
        }

        $agencyType = $this->agencyTypeRepository->update($input, $id);

        return $this->sendResponse($agencyType->toArray(), 'AgencyType updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/agencyTypes/{id}",
     *      summary="Remove the specified AgencyType from storage",
     *      tags={"AgencyType"},
     *      description="Delete AgencyType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AgencyType",
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
        /** @var AgencyType $agencyType */
        $agencyType = $this->agencyTypeRepository->find($id);

        if (empty($agencyType)) {
            return $this->sendError('Agency Type not found');
        }

        $agencyType->delete();

        return $this->sendSuccess('Agency Type deleted successfully');
    }
}
