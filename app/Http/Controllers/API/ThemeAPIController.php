<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateThemeAPIRequest;
use App\Http\Requests\API\UpdateThemeAPIRequest;
use App\Models\Theme;
use App\Repositories\ThemeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ThemeController
 * @package App\Http\Controllers\API
 */

class ThemeAPIController extends AppBaseController
{
    /** @var  ThemeRepository */
    private $themeRepository;

    public function __construct(ThemeRepository $themeRepo)
    {
        $this->themeRepository = $themeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/themes",
     *      summary="Get a listing of the Themes.",
     *      tags={"Theme"},
     *      description="Get all Themes",
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
     *                  @SWG\Items(ref="#/definitions/Theme")
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
        $themes = $this->themeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($themes->toArray(), 'Themes retrieved successfully');
    }

    /**
     * @param CreateThemeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/themes",
     *      summary="Store a newly created Theme in storage",
     *      tags={"Theme"},
     *      description="Store Theme",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Theme that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Theme")
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
     *                  ref="#/definitions/Theme"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateThemeAPIRequest $request)
    {
        $input = $request->all();

        $theme = $this->themeRepository->create($input);

        return $this->sendResponse($theme->toArray(), 'Theme saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/themes/{id}",
     *      summary="Display the specified Theme",
     *      tags={"Theme"},
     *      description="Get Theme",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Theme",
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
     *                  ref="#/definitions/Theme"
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
        /** @var Theme $theme */
        $theme = $this->themeRepository->find($id);

        if (empty($theme)) {
            return $this->sendError('Theme not found');
        }

        return $this->sendResponse($theme->toArray(), 'Theme retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateThemeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/themes/{id}",
     *      summary="Update the specified Theme in storage",
     *      tags={"Theme"},
     *      description="Update Theme",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Theme",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Theme that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Theme")
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
     *                  ref="#/definitions/Theme"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateThemeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Theme $theme */
        $theme = $this->themeRepository->find($id);

        if (empty($theme)) {
            return $this->sendError('Theme not found');
        }

        $theme = $this->themeRepository->update($input, $id);

        return $this->sendResponse($theme->toArray(), 'Theme updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/themes/{id}",
     *      summary="Remove the specified Theme from storage",
     *      tags={"Theme"},
     *      description="Delete Theme",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Theme",
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
        /** @var Theme $theme */
        $theme = $this->themeRepository->find($id);

        if (empty($theme)) {
            return $this->sendError('Theme not found');
        }

        $theme->delete();

        return $this->sendSuccess('Theme deleted successfully');
    }
}
