<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubProjectItemsAPIRequest;
use App\Http\Requests\API\UpdateSubProjectItemsAPIRequest;
use App\Http\Resources\SubProjectItemsResource;
use App\Models\SubProjectItems;
use App\Repositories\SubProjectItemsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubProjectItemsController
 * @package App\Http\Controllers\API
 */

class SubProjectItemsAPIController extends AppBaseController
{
    /** @var  SubProjectItemsRepository */
    private $subProjectItemsRepository;

    public function __construct(SubProjectItemsRepository $subProjectItemsRepo)
    {
        $this->subProjectItemsRepository = $subProjectItemsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sub_project_items",
     *      summary="Get a listing of the SubProjectItems.",
     *      tags={"SubProjectItems"},
     *     security={{"Bearer":{}}},
     *      description="Get all SubProjectItems",
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
     *                  @SWG\Items(ref="#/definitions/SubProjectItems")
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
        $subProjectItems = $this->subProjectItemsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(SubProjectItemsResource::collection($subProjectItems), 'Sub Project Items retrieved successfully');
    }

    /**
     * @param CreateSubProjectItemsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sub_project_items",
     *      summary="Store a newly created SubProjectItems in storage",
     *      tags={"SubProjectItems"},
     *     security={{"Bearer":{}}},
     *      description="Store SubProjectItems",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectItems that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectItems")
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
     *                  ref="#/definitions/SubProjectItems"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSubProjectItemsAPIRequest $request)
    {
        $input = $request->all();

        $subProjectItems = $this->subProjectItemsRepository->create($input);

        return $this->sendResponse($subProjectItems->toArray(), 'Sub Project Items saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sub_project_items/{id}",
     *      summary="Display the specified SubProjectItems",
     *      tags={"SubProjectItems"},
     *     security={{"Bearer":{}}},
     *      description="Get SubProjectItems",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectItems",
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
     *                  ref="#/definitions/SubProjectItems"
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
        /** @var SubProjectItems $subProjectItems */
        $subProjectItems = $this->subProjectItemsRepository->find($id);

        if (empty($subProjectItems)) {
            return $this->sendError('Sub Project Items not found');
        }

        return $this->sendResponse(new SubProjectItemsResource($subProjectItems), 'Sub Project Items retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSubProjectItemsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sub_project_items/{id}",
     *      summary="Update the specified SubProjectItems in storage",
     *      tags={"SubProjectItems"},
     *     security={{"Bearer":{}}},
     *      description="Update SubProjectItems",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectItems",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectItems that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectItems")
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
     *                  ref="#/definitions/SubProjectItems"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSubProjectItemsAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubProjectItems $subProjectItems */
        $subProjectItems = $this->subProjectItemsRepository->find($id);

        if (empty($subProjectItems)) {
            return $this->sendError('Sub Project Items not found');
        }

        $subProjectItems = $this->subProjectItemsRepository->update($input, $id);

        return $this->sendResponse($subProjectItems->toArray(), 'SubProjectItems updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sub_project_items/{id}",
     *      summary="Remove the specified SubProjectItems from storage",
     *      tags={"SubProjectItems"},
     *     security={{"Bearer":{}}},
     *      description="Delete SubProjectItems",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectItems",
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
        /** @var SubProjectItems $subProjectItems */
        $subProjectItems = $this->subProjectItemsRepository->find($id);

        if (empty($subProjectItems)) {
            return $this->sendError('Sub Project Items not found');
        }

        $subProjectItems->delete();

        return $this->sendSuccess('Sub Project Items deleted successfully');
    }
}
