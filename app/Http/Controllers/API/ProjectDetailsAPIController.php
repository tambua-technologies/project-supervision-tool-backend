<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProjectDetailsAPIRequest;
use App\Http\Requests\API\UpdateProjectDetailsAPIRequest;
use App\Http\Resources\ProjectDetailResource;
use App\Models\ProjectDetails;
use App\Repositories\ProjectDetailsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProjectDetailsController
 * @package App\Http\Controllers\API
 */

class ProjectDetailsAPIController extends AppBaseController
{
    /** @var  ProjectDetailsRepository */
    private $projectDetailsRepository;

    public function __construct(ProjectDetailsRepository $projectDetailsRepo)
    {
        $this->projectDetailsRepository = $projectDetailsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/project_details",
     *      summary="Get a listing of the ProjectDetails.",
     *      tags={"ProjectDetails"},
     *      description="Get all ProjectDetails",
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
     *                  @SWG\Items(ref="#/definitions/ProjectDetails")
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
        $projectDetails = $this->projectDetailsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ProjectDetailResource::collection($projectDetails), 'Project Details retrieved successfully');
    }

    /**
     * @param CreateProjectDetailsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/project_details",
     *      summary="Store a newly created ProjectDetails in storage",
     *      tags={"ProjectDetails"},
     *      description="Store ProjectDetails",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjectDetails that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectDetails")
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
     *                  ref="#/definitions/ProjectDetails"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProjectDetailsAPIRequest $request)
    {
        $input = $request->all();

        $projectDetails = $this->projectDetailsRepository->create($input);

        return $this->sendResponse(new ProjectDetailResource($projectDetails), 'Project Details saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/project_details/{id}",
     *      summary="Display the specified ProjectDetails",
     *      tags={"ProjectDetails"},
     *      description="Get ProjectDetails",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectDetails",
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
     *                  ref="#/definitions/ProjectDetails"
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
        /** @var ProjectDetails $projectDetails */
        $projectDetails = $this->projectDetailsRepository->find($id);

        if (empty($projectDetails)) {
            return $this->sendError('Project Details not found');
        }

        return $this->sendResponse(new ProjectDetailResource($projectDetails), 'Project Details retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProjectDetailsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/project_details/{id}",
     *      summary="Update the specified ProjectDetails in storage",
     *      tags={"ProjectDetails"},
     *      description="Update ProjectDetails",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectDetails",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjectDetails that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectDetails")
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
     *                  ref="#/definitions/ProjectDetails"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProjectDetailsAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProjectDetails $projectDetails */
        $projectDetails = $this->projectDetailsRepository->find($id);

        if (empty($projectDetails)) {
            return $this->sendError('Project Details not found');
        }

        $projectDetails = $this->projectDetailsRepository->update($input, $id);

        return $this->sendResponse(new ProjectDetailResource($projectDetails), 'ProjectDetails updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/project_details/{id}",
     *      summary="Remove the specified ProjectDetails from storage",
     *      tags={"ProjectDetails"},
     *      description="Delete ProjectDetails",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectDetails",
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
        /** @var ProjectDetails $projectDetails */
        $projectDetails = $this->projectDetailsRepository->find($id);

        if (empty($projectDetails)) {
            return $this->sendError('Project Details not found');
        }

        $projectDetails->delete();

        return $this->sendSuccess('Project Details deleted successfully');
    }
}
