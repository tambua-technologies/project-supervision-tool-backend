<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInitiativeTypeAPIRequest;
use App\Http\Requests\API\UpdateInitiativeTypeAPIRequest;
use App\Models\InitiativeType;
use App\Repositories\InitiativeTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class InitiativeTypeController
 * @package App\Http\Controllers\API
 */

class InitiativeTypeAPIController extends AppBaseController
{
    /** @var  InitiativeTypeRepository */
    private $initiativeTypeRepository;

    public function __construct(InitiativeTypeRepository $initiativeTypeRepo)
    {
        $this->initiativeTypeRepository = $initiativeTypeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/initiativeTypes",
     *      summary="Get a listing of the InitiativeTypes.",
     *      tags={"InitiativeType"},
     *      description="Get all InitiativeTypes",
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
     *                  @SWG\Items(ref="#/definitions/InitiativeType")
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
        $initiativeTypes = $this->initiativeTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($initiativeTypes->toArray(), 'Initiative Types retrieved successfully');
    }

    /**
     * @param CreateInitiativeTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/initiativeTypes",
     *      summary="Store a newly created InitiativeType in storage",
     *      tags={"InitiativeType"},
     *      description="Store InitiativeType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InitiativeType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InitiativeType")
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
     *                  ref="#/definitions/InitiativeType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInitiativeTypeAPIRequest $request)
    {
        $input = $request->all();

        $initiativeType = $this->initiativeTypeRepository->create($input);

        return $this->sendResponse($initiativeType->toArray(), 'Initiative Type saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/initiativeTypes/{id}",
     *      summary="Display the specified InitiativeType",
     *      tags={"InitiativeType"},
     *      description="Get InitiativeType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InitiativeType",
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
     *                  ref="#/definitions/InitiativeType"
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
        /** @var InitiativeType $initiativeType */
        $initiativeType = $this->initiativeTypeRepository->find($id);

        if (empty($initiativeType)) {
            return $this->sendError('Initiative Type not found');
        }

        return $this->sendResponse($initiativeType->toArray(), 'Initiative Type retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInitiativeTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/initiativeTypes/{id}",
     *      summary="Update the specified InitiativeType in storage",
     *      tags={"InitiativeType"},
     *      description="Update InitiativeType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InitiativeType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InitiativeType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InitiativeType")
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
     *                  ref="#/definitions/InitiativeType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInitiativeTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var InitiativeType $initiativeType */
        $initiativeType = $this->initiativeTypeRepository->find($id);

        if (empty($initiativeType)) {
            return $this->sendError('Initiative Type not found');
        }

        $initiativeType = $this->initiativeTypeRepository->update($input, $id);

        return $this->sendResponse($initiativeType->toArray(), 'InitiativeType updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/initiativeTypes/{id}",
     *      summary="Remove the specified InitiativeType from storage",
     *      tags={"InitiativeType"},
     *      description="Delete InitiativeType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InitiativeType",
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
        /** @var InitiativeType $initiativeType */
        $initiativeType = $this->initiativeTypeRepository->find($id);

        if (empty($initiativeType)) {
            return $this->sendError('Initiative Type not found');
        }

        $initiativeType->delete();

        return $this->sendSuccess('Initiative Type deleted successfully');
    }
}
