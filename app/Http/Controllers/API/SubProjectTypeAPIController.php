<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubProjectTypeAPIRequest;
use App\Http\Requests\API\UpdateSubProjectTypeAPIRequest;
use App\Models\SubProjectType;
use App\Repositories\SubProjectTypeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class SubProjectTypeController
 * @package App\Http\Controllers\API
 */

class SubProjectTypeAPIController extends AppBaseController
{
    /** @var  SubProjectTypeRepository */
    private $subProjectTypeRepository;

    public function __construct(SubProjectTypeRepository $subProjectTypeRepo)
    {
        $this->subProjectTypeRepository = $subProjectTypeRepo;
    }

    /**
     *
     * @SWG\Get(
     *      path="/sub_project_types",
     *      summary="Get a listing of the SubProjectTypes.",
     *      tags={"SubProjectType"},
     *     security={{"Bearer":{}}},
     *      description="Get all SubProjectTypes",
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
     *                  @SWG\Items(ref="#/definitions/SubProjectType")
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
        $subProjectTypes = $this->subProjectTypeRepository->paginate($request->get('per_page', 15));

        return $this->sendResponse($subProjectTypes, 'SubProjectTypes retrieved successfully');
    }

    /**
     * @param CreateSubProjectTypeAPIRequest $request
     *
     * @SWG\Post(
     *      path="/sub_project_types",
     *      summary="Store a newly created SubProjectType in storage",
     *      tags={"SubProjectType"},
     *     security={{"Bearer":{}}},
     *      description="Store SubProjectType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectTypePayload")
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
     *                  ref="#/definitions/SubProjectType"
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
    public function store(CreateSubProjectTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $subProjectType = $this->subProjectTypeRepository->create($input);

        return $this->sendResponse($subProjectType->toArray(), 'SubProjectType saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/sub_project_types/{id}",
     *      summary="Display the specified SubProjectType",
     *      tags={"SubProjectType"},
     *     security={{"Bearer":{}}},
     *      description="Get SubProjectType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectType",
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
     *                  ref="#/definitions/SubProjectType"
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
        /** @var SubProjectType $subProjectType */
        $subProjectType = $this->subProjectTypeRepository->find($id);

        if (empty($subProjectType)) {
            return $this->sendError('SubProjectType not found');
        }

        return $this->sendResponse($subProjectType->toArray(), 'SubProjectType retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSubProjectTypeAPIRequest $request
     *
     * @SWG\Put(
     *      path="/sub_project_types/{id}",
     *      summary="Update the specified SubProjectType in storage",
     *      tags={"SubProjectType"},
     *     security={{"Bearer":{}}},
     *      description="Update SubProjectType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectType")
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
     *                  ref="#/definitions/SubProjectType"
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
    public function update(int $id, UpdateSubProjectTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var SubProjectType $subProjectType */
        $subProjectType = $this->subProjectTypeRepository->find($id);

        if (empty($subProjectType)) {
            return $this->sendError('SubProjectType not found');
        }

        $subProjectType = $this->subProjectTypeRepository->update($input, $id);

        return $this->sendResponse($subProjectType->toArray(), 'SubProjectType updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/sub_project_types/{id}",
     *      summary="Remove the specified SubProjectType from storage",
     *      tags={"SubProjectType"},
     *     security={{"Bearer":{}}},
     *      description="Delete SubProjectType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectType",
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
        /** @var SubProjectType $subProjectType */
        $subProjectType = $this->subProjectTypeRepository->find($id);

        if ($subProjectType === null) {
            return $this->sendError('SubProjectType not found');
        }

        $subProjectType->delete();

        return $this->sendSuccess('SubProjectType deleted successfully');
    }
}
