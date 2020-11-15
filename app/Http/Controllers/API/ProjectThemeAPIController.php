<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProjectThemeAPIRequest;
use App\Http\Requests\API\UpdateProjectThemeAPIRequest;
use App\Models\ProjectTheme;
use App\Repositories\ProjectThemeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProjectThemeController
 * @package App\Http\Controllers\API
 */

class ProjectThemeAPIController extends AppBaseController
{
    /** @var  ProjectThemeRepository */
    private $projectThemeRepository;

    public function __construct(ProjectThemeRepository $projectThemeRepo)
    {
        $this->projectThemeRepository = $projectThemeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/projectThemes",
     *      summary="Get a listing of the ProjectThemes.",
     *      tags={"ProjectTheme"},
     *     security={{"Bearer":{}}},
     *      description="Get all ProjectThemes",
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
     *                  @SWG\Items(ref="#/definitions/ProjectTheme")
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
        $projectThemes = $this->projectThemeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($projectThemes->toArray(), 'Project Themes retrieved successfully');
    }

    /**
     * @param CreateProjectThemeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/projectThemes",
     *      summary="Store a newly created ProjectTheme in storage",
     *      tags={"ProjectTheme"},
     *     security={{"Bearer":{}}},
     *      description="Store ProjectTheme",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjectTheme that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectTheme")
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
     *                  ref="#/definitions/ProjectTheme"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProjectThemeAPIRequest $request)
    {
        $input = $request->all();

        $projectTheme = $this->projectThemeRepository->create($input);

        return $this->sendResponse($projectTheme->toArray(), 'Project Theme saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/projectThemes/{id}",
     *      summary="Display the specified ProjectTheme",
     *      tags={"ProjectTheme"},
     *     security={{"Bearer":{}}},
     *      description="Get ProjectTheme",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectTheme",
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
     *                  ref="#/definitions/ProjectTheme"
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
        /** @var ProjectTheme $projectTheme */
        $projectTheme = $this->projectThemeRepository->find($id);

        if (empty($projectTheme)) {
            return $this->sendError('Project Theme not found');
        }

        return $this->sendResponse($projectTheme->toArray(), 'Project Theme retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProjectThemeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/projectThemes/{id}",
     *      summary="Update the specified ProjectTheme in storage",
     *      tags={"ProjectTheme"},
     *     security={{"Bearer":{}}},
     *      description="Update ProjectTheme",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectTheme",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjectTheme that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectTheme")
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
     *                  ref="#/definitions/ProjectTheme"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProjectThemeAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProjectTheme $projectTheme */
        $projectTheme = $this->projectThemeRepository->find($id);

        if (empty($projectTheme)) {
            return $this->sendError('Project Theme not found');
        }

        $projectTheme = $this->projectThemeRepository->update($input, $id);

        return $this->sendResponse($projectTheme->toArray(), 'ProjectTheme updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/projectThemes/{id}",
     *      summary="Remove the specified ProjectTheme from storage",
     *      tags={"ProjectTheme"},
     *     security={{"Bearer":{}}},
     *      description="Delete ProjectTheme",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectTheme",
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
        /** @var ProjectTheme $projectTheme */
        $projectTheme = $this->projectThemeRepository->find($id);

        if (empty($projectTheme)) {
            return $this->sendError('Project Theme not found');
        }

        $projectTheme->delete();

        return $this->sendSuccess('Project Theme deleted successfully');
    }
}
