<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubProjectStatusAPIRequest;
use App\Http\Requests\API\UpdateSubProjectStatusAPIRequest;
use App\Models\SubProjectStatus;
use App\Repositories\SubProjectStatusRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubProjectStatusController
 * @package App\Http\Controllers\API
 */

class SubProjectStatusAPIController extends AppBaseController
{
    /** @var  SubProjectStatusRepository */
    private $subProjectStatusRepository;

    public function __construct(SubProjectStatusRepository $subProjectStatusRepo)
    {
        $this->subProjectStatusRepository = $subProjectStatusRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/sub_project_status",
     *      summary="Get a listing of the SubProjectStatuses.",
     *      tags={"SubProjectStatus"},
     *     security={{"Bearer":{}}},
     *      description="Get all SubProjectStatuses",
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
     *                  @SWG\Items(ref="#/definitions/SubProjectStatus")
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
    public function index(Request $request): JsonResponse
    {
        $subProjectStatuses = $this->subProjectStatusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subProjectStatuses->toArray(), 'SubProject Statuses retrieved successfully');
    }

    /**
     * @param CreateSubProjectStatusAPIRequest $request
     *
     * @SWG\Post(
     *      path="/sub_project_status",
     *      summary="Store a newly created SubProjectStatus in storage",
     *      tags={"SubProjectStatus"},
     *     security={{"Bearer":{}}},
     *      description="Store SubProjectStatus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectStatus that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectStatus")
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
     *                  ref="#/definitions/SubProjectStatus"
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
    public function store(CreateSubProjectStatusAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $subProjectStatus = $this->subProjectStatusRepository->create($input);

        return $this->sendResponse($subProjectStatus->toArray(), 'SubProject Status saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/sub_project_status/{id}",
     *      summary="Display the specified SubProjectStatus",
     *      tags={"SubProjectStatus"},
     *     security={{"Bearer":{}}},
     *      description="Get SubProjectStatus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectStatus",
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
     *                  ref="#/definitions/SubProjectStatus"
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
    public function show(int $id): JsonResponse
    {
        /** @var SubProjectStatus $subProjectStatus */
        $subProjectStatus = $this->subProjectStatusRepository->find($id);

        if ($subProjectStatus === null) {
            return $this->sendError('SubProject Status not found');
        }

        return $this->sendResponse($subProjectStatus->toArray(), 'SubProject Status retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSubProjectStatusAPIRequest $request
     *
     * @SWG\Put(
     *      path="/sub_project_status/{id}",
     *      summary="Update the specified SubProjectStatus in storage",
     *      tags={"SubProjectStatus"},
     *     security={{"Bearer":{}}},
     *      description="Update SubProjectStatus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectStatus",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectStatus that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectStatus")
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
     *                  ref="#/definitions/SubProjectStatus"
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
    public function update(int $id, UpdateSubProjectStatusAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var SubProjectStatus $subProjectStatus */
        $subProjectStatus = $this->subProjectStatusRepository->find($id);

        if ($subProjectStatus === null) {
            return $this->sendError('SubProject Status not found');
        }

        $subProjectStatus = $this->subProjectStatusRepository->update($input, $id);

        return $this->sendResponse($subProjectStatus->toArray(), 'SubProjectStatus updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/sub_project_status/{id}",
     *      summary="Remove the specified SubProjectStatus from storage",
     *      tags={"SubProjectStatus"},
     *     security={{"Bearer":{}}},
     *      description="Delete SubProjectStatus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectStatus",
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
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        /** @var SubProjectStatus $subProjectStatus */
        $subProjectStatus = $this->subProjectStatusRepository->find($id);

        if ($subProjectStatus === null) {
            return $this->sendError('SubProject Status not found');
        }

        $subProjectStatus->delete();

        return $this->sendSuccess('SubProject Status deleted successfully');
    }
}
