<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProjectSectorsAPIRequest;
use App\Http\Requests\API\UpdateProjectSectorsAPIRequest;
use App\Models\ProjectSectors;
use App\Repositories\ProjectSectorsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProjectSectorsController
 * @package App\Http\Controllers\API
 */

class ProjectSectorsAPIController extends AppBaseController
{
    /** @var  ProjectSectorsRepository */
    private $projectSectorsRepository;

    public function __construct(ProjectSectorsRepository $projectSectorsRepo)
    {
        $this->projectSectorsRepository = $projectSectorsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/projectSectors",
     *      summary="Get a listing of the ProjectSectors.",
     *      tags={"ProjectSectors"},
     *     security={{"Bearer":{}}},
     *      description="Get all ProjectSectors",
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
     *                  @SWG\Items(ref="#/definitions/ProjectSectors")
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
        $projectSectors = $this->projectSectorsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($projectSectors->toArray(), 'Project Sectors retrieved successfully');
    }

    /**
     * @param CreateProjectSectorsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/projectSectors",
     *      summary="Store a newly created ProjectSectors in storage",
     *      tags={"ProjectSectors"},
     *     security={{"Bearer":{}}},
     *      description="Store ProjectSectors",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjectSectors that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectSectors")
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
     *                  ref="#/definitions/ProjectSectors"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProjectSectorsAPIRequest $request)
    {
        $input = $request->all();

        $projectSectors = $this->projectSectorsRepository->create($input);

        return $this->sendResponse($projectSectors->toArray(), 'Project Sectors saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/projectSectors/{id}",
     *      summary="Display the specified ProjectSectors",
     *      tags={"ProjectSectors"},
     *     security={{"Bearer":{}}},
     *      description="Get ProjectSectors",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectSectors",
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
     *                  ref="#/definitions/ProjectSectors"
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
        /** @var ProjectSectors $projectSectors */
        $projectSectors = $this->projectSectorsRepository->find($id);

        if (empty($projectSectors)) {
            return $this->sendError('Project Sectors not found');
        }

        return $this->sendResponse($projectSectors->toArray(), 'Project Sectors retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProjectSectorsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/projectSectors/{id}",
     *      summary="Update the specified ProjectSectors in storage",
     *      tags={"ProjectSectors"},
     *     security={{"Bearer":{}}},
     *      description="Update ProjectSectors",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectSectors",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjectSectors that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectSectors")
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
     *                  ref="#/definitions/ProjectSectors"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProjectSectorsAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProjectSectors $projectSectors */
        $projectSectors = $this->projectSectorsRepository->find($id);

        if (empty($projectSectors)) {
            return $this->sendError('Project Sectors not found');
        }

        $projectSectors = $this->projectSectorsRepository->update($input, $id);

        return $this->sendResponse($projectSectors->toArray(), 'ProjectSectors updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/projectSectors/{id}",
     *      summary="Remove the specified ProjectSectors from storage",
     *      tags={"ProjectSectors"},
     *     security={{"Bearer":{}}},
     *      description="Delete ProjectSectors",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectSectors",
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
        /** @var ProjectSectors $projectSectors */
        $projectSectors = $this->projectSectorsRepository->find($id);

        if (empty($projectSectors)) {
            return $this->sendError('Project Sectors not found');
        }

        $projectSectors->delete();

        return $this->sendSuccess('Project Sectors deleted successfully');
    }
}
