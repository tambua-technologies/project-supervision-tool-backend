<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubProjectAPIRequest;
use App\Http\Requests\API\UpdateSubProjectAPIRequest;
use App\Http\Resources\SubProjectResource;
use App\Models\SubProject;
use App\Repositories\SubProjectRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubProjectController
 * @package App\Http\Controllers\API
 */

class SubProjectAPIController extends AppBaseController
{
    /** @var  SubProjectRepository */
    private $subProjectRepository;

    public function __construct(SubProjectRepository $subProjectRepo)
    {
        $this->subProjectRepository = $subProjectRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sub_projects",
     *      summary="Get a listing of the SubProjects.",
     *      tags={"SubProject"},
     *      description="Get all SubProjects",
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
     *                  @SWG\Items(ref="#/definitions/SubProject")
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
        $subProjects = $this->subProjectRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(SubProjectResource::collection($subProjects), 'Sub Projects retrieved successfully');
    }

    /**
     * @param CreateSubProjectAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sub_projects",
     *      summary="Store a newly created SubProject in storage",
     *      tags={"SubProject"},
     *      description="Store SubProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProject that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProject")
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
     *                  ref="#/definitions/SubProject"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSubProjectAPIRequest $request)
    {
        $input = $request->all();

        $subProject = $this->subProjectRepository->create($input);

        return $this->sendResponse(new SubProjectResource($subProject), 'Sub Project saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sub_projects/{id}",
     *      summary="Display the specified SubProject",
     *      tags={"SubProject"},
     *      description="Get SubProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProject",
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
     *                  ref="#/definitions/SubProject"
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
        /** @var SubProject $subProject */
        $subProject = $this->subProjectRepository->find($id);

        if (empty($subProject)) {
            return $this->sendError('Sub Project not found');
        }

        return $this->sendResponse(new SubProjectResource($subProject), 'Sub Project retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSubProjectAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sub_projects/{id}",
     *      summary="Update the specified SubProject in storage",
     *      tags={"SubProject"},
     *      description="Update SubProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProject",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProject that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProject")
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
     *                  ref="#/definitions/SubProject"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSubProjectAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubProject $subProject */
        $subProject = $this->subProjectRepository->find($id);

        if (empty($subProject)) {
            return $this->sendError('Sub Project not found');
        }

        $subProject = $this->subProjectRepository->update($input, $id);

        return $this->sendResponse(new SubProjectResource($subProject), 'SubProject updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sub_projects/{id}",
     *      summary="Remove the specified SubProject from storage",
     *      tags={"SubProject"},
     *      description="Delete SubProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProject",
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
        /** @var SubProject $subProject */
        $subProject = $this->subProjectRepository->find($id);

        if (empty($subProject)) {
            return $this->sendError('Sub Project not found');
        }

        $subProject->delete();

        return $this->sendSuccess('Sub Project deleted successfully');
    }
}
