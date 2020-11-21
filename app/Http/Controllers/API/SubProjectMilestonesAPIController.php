<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubProjectMilestonesAPIRequest;
use App\Http\Requests\API\UpdateSubProjectMilestonesAPIRequest;
use App\Models\SubProjectMilestones;
use App\Repositories\SubProjectMilestonesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubProjectMilestonesController
 * @package App\Http\Controllers\API
 */

class SubProjectMilestonesAPIController extends AppBaseController
{
    /** @var  SubProjectMilestonesRepository */
    private $subProjectMilestonesRepository;

    public function __construct(SubProjectMilestonesRepository $subProjectMilestonesRepo)
    {
        $this->subProjectMilestonesRepository = $subProjectMilestonesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sub_project_milestones",
     *      summary="Get a listing of the SubProjectMilestones.",
     *      tags={"SubProjectMilestones"},
     *     security={{"Bearer":{}}},
     *      description="Get all SubProjectMilestones",
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
     *                  @SWG\Items(ref="#/definitions/SubProjectMilestones")
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
        $subProjectMilestones = $this->subProjectMilestonesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subProjectMilestones->toArray(), 'Sub Project Milestones retrieved successfully');
    }

    /**
     * @param CreateSubProjectMilestonesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sub_project_milestones",
     *      summary="Store a newly created SubProjectMilestones in storage",
     *      tags={"SubProjectMilestones"},
     *     security={{"Bearer":{}}},
     *      description="Store SubProjectMilestones",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectMilestones that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectMilestones")
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
     *                  ref="#/definitions/SubProjectMilestones"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSubProjectMilestonesAPIRequest $request)
    {
        $input = $request->all();

        $subProjectMilestones = $this->subProjectMilestonesRepository->create($input);

        return $this->sendResponse($subProjectMilestones->toArray(), 'Sub Project Milestones saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sub_project_milestones/{id}",
     *      summary="Display the specified SubProjectMilestones",
     *      tags={"SubProjectMilestones"},
     *     security={{"Bearer":{}}},
     *      description="Get SubProjectMilestones",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectMilestones",
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
     *                  ref="#/definitions/SubProjectMilestones"
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
        /** @var SubProjectMilestones $subProjectMilestones */
        $subProjectMilestones = $this->subProjectMilestonesRepository->find($id);

        if (empty($subProjectMilestones)) {
            return $this->sendError('Sub Project Milestones not found');
        }

        return $this->sendResponse($subProjectMilestones->toArray(), 'Sub Project Milestones retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSubProjectMilestonesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sub_project_milestones/{id}",
     *      summary="Update the specified SubProjectMilestones in storage",
     *      tags={"SubProjectMilestones"},
     *     security={{"Bearer":{}}},
     *      description="Update SubProjectMilestones",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectMilestones",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectMilestones that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectMilestones")
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
     *                  ref="#/definitions/SubProjectMilestones"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSubProjectMilestonesAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubProjectMilestones $subProjectMilestones */
        $subProjectMilestones = $this->subProjectMilestonesRepository->find($id);

        if (empty($subProjectMilestones)) {
            return $this->sendError('Sub Project Milestones not found');
        }

        $subProjectMilestones = $this->subProjectMilestonesRepository->update($input, $id);

        return $this->sendResponse($subProjectMilestones->toArray(), 'SubProjectMilestones updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sub_project_milestones/{id}",
     *      summary="Remove the specified SubProjectMilestones from storage",
     *      tags={"SubProjectMilestones"},
     *     security={{"Bearer":{}}},
     *      description="Delete SubProjectMilestones",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectMilestones",
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
        /** @var SubProjectMilestones $subProjectMilestones */
        $subProjectMilestones = $this->subProjectMilestonesRepository->find($id);

        if (empty($subProjectMilestones)) {
            return $this->sendError('Sub Project Milestones not found');
        }

        $subProjectMilestones->delete();

        return $this->sendSuccess('Sub Project Milestones deleted successfully');
    }
}