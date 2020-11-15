<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubProjectDetailAPIRequest;
use App\Http\Requests\API\UpdateSubProjectDetailAPIRequest;
use App\Models\SubProjectDetail;
use App\Repositories\SubProjectDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubProjectDetailController
 * @package App\Http\Controllers\API
 */

class SubProjectDetailAPIController extends AppBaseController
{
    /** @var  SubProjectDetailRepository */
    private $subProjectDetailRepository;

    public function __construct(SubProjectDetailRepository $subProjectDetailRepo)
    {
        $this->subProjectDetailRepository = $subProjectDetailRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/subProjectDetails",
     *      summary="Get a listing of the SubProjectDetails.",
     *      tags={"SubProjectDetail"},
     *     security={{"Bearer":{}}},
     *      description="Get all SubProjectDetails",
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
     *                  @SWG\Items(ref="#/definitions/SubProjectDetail")
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
        $subProjectDetails = $this->subProjectDetailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subProjectDetails->toArray(), 'Sub Project Details retrieved successfully');
    }

    /**
     * @param CreateSubProjectDetailAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/subProjectDetails",
     *      summary="Store a newly created SubProjectDetail in storage",
     *      tags={"SubProjectDetail"},
     *     security={{"Bearer":{}}},
     *      description="Store SubProjectDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectDetail that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectDetail")
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
     *                  ref="#/definitions/SubProjectDetail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSubProjectDetailAPIRequest $request)
    {
        $input = $request->all();

        $subProjectDetail = $this->subProjectDetailRepository->create($input);

        return $this->sendResponse($subProjectDetail->toArray(), 'Sub Project Detail saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/subProjectDetails/{id}",
     *      summary="Display the specified SubProjectDetail",
     *      tags={"SubProjectDetail"},
     *     security={{"Bearer":{}}},
     *      description="Get SubProjectDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectDetail",
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
     *                  ref="#/definitions/SubProjectDetail"
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
        /** @var SubProjectDetail $subProjectDetail */
        $subProjectDetail = $this->subProjectDetailRepository->find($id);

        if (empty($subProjectDetail)) {
            return $this->sendError('Sub Project Detail not found');
        }

        return $this->sendResponse($subProjectDetail->toArray(), 'Sub Project Detail retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSubProjectDetailAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/subProjectDetails/{id}",
     *      summary="Update the specified SubProjectDetail in storage",
     *      tags={"SubProjectDetail"},
     *     security={{"Bearer":{}}},
     *      description="Update SubProjectDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectDetail",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectDetail that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectDetail")
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
     *                  ref="#/definitions/SubProjectDetail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSubProjectDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubProjectDetail $subProjectDetail */
        $subProjectDetail = $this->subProjectDetailRepository->find($id);

        if (empty($subProjectDetail)) {
            return $this->sendError('Sub Project Detail not found');
        }

        $subProjectDetail = $this->subProjectDetailRepository->update($input, $id);

        return $this->sendResponse($subProjectDetail->toArray(), 'SubProjectDetail updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/subProjectDetails/{id}",
     *      summary="Remove the specified SubProjectDetail from storage",
     *      tags={"SubProjectDetail"},
     *     security={{"Bearer":{}}},
     *      description="Delete SubProjectDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectDetail",
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
        /** @var SubProjectDetail $subProjectDetail */
        $subProjectDetail = $this->subProjectDetailRepository->find($id);

        if (empty($subProjectDetail)) {
            return $this->sendError('Sub Project Detail not found');
        }

        $subProjectDetail->delete();

        return $this->sendSuccess('Sub Project Detail deleted successfully');
    }
}
