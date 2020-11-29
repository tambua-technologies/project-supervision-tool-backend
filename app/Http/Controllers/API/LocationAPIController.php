<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLocationAPIRequest;
use App\Http\Requests\API\UpdateLocationAPIRequest;
use App\Http\Resources\LocationResource;
use App\Http\Resources\Projects\ProjectOverview;
use App\Http\Resources\Projects\ProjectOverviewWithLocation;
use App\Http\Resources\Projects\ProjectResource;
use App\Http\Resources\SimpleLocationResource;
use App\Models\District;
use App\Models\Location;
use App\Models\Region;
use App\Repositories\LocationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LocationController
 * @package App\Http\Controllers\API
 */

class LocationAPIController extends AppBaseController
{
    /** @var  LocationRepository */
    private $locationRepository;

    public function __construct(LocationRepository $locationRepo)
    {
        $this->locationRepository = $locationRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/locations",
     *      summary="Get a listing of the Locations.",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Get all Locations",
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
     *                  @SWG\Items(ref="#/definitions/Location")
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
        $locations = $this->locationRepository->paginate($request->get('per_page', 15));

        return $this->sendResponse(LocationResource::collection($locations), 'Locations retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/locations/regions",
     *      summary="Get a listing of the regions.",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Get all regions",
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
     *                  @SWG\Items(ref="#/definitions/Region")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function regions()
    {
        $locations = Region::all();

        return $this->sendResponse(SimpleLocationResource::collection($locations), 'Regions retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/locations/regions/projects_overview",
     *      summary="Get an overview of projects per region ",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Get an overview of projects per region",
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
     *                  @SWG\Items(ref="#/definitions/Region")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function projectsOverviewPerRegion()
    {
        $projectsOverview = Region::projectsOverview();

        return $this->sendResponse(ProjectOverview::collection($projectsOverview), 'Projects Overview retrieved successfully');
    }

    /**
     * @param $region_id
     * @return Response
     *
     * @SWG\Get(
     *      path="/locations/regions/{region_id}/projects",
     *      summary="get projects  based on region",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description=" get projects  based on region ",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="region_id",
     *          description="id of Region",
     *          type="string",
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
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Region")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function getProjectsByRegion($region_id)
    {
        $projectsOverview = Region::getProjects($region_id);

        return $this->sendResponse(ProjectOverviewWithLocation::collection($projectsOverview), 'Region projects retrieved successfully');
    }


    /**
     * @param $region_id
     * @return Response
     *
     * @SWG\Get(
     *      path="/locations/districts/{region_id}",
     *      summary="Get a listing of the districts.",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Get all districts",
     *      produces={"application/json"},
     *     @SWG\Parameter(
     *          name="region_id",
     *          description="id of Region",
     *          type="string",
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
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/District")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function districts($region_id)
    {
        $locations = District::query()->where('region_id', $region_id)->get();

        return $this->sendResponse(SimpleLocationResource::collection($locations), 'Districts retrieved successfully');
    }

    /**
     * @param CreateLocationAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/locations",
     *      summary="Store a newly created Location in storage",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Store Location",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Location that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Location")
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
     *                  ref="#/definitions/Location"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateLocationAPIRequest $request)
    {
        $input = $request->all();

        $location = $this->locationRepository->create($input);

        return $this->sendResponse($location->toArray(), 'Location saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/locations/{id}",
     *      summary="Display the specified Location",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Get Location",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Location",
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
     *                  ref="#/definitions/Location"
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
        /** @var Location $location */
        $location = $this->locationRepository->find($id);

        if (empty($location)) {
            return $this->sendError('Location not found');
        }

        return $this->sendResponse($location->toArray(), 'Location retrieved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/locations/region/{id}",
     *      summary="Display the specified Location",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Get Location",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of region",
     *          type="string",
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
     *                  ref="#/definitions/Location"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function getRegion($id)
    {
        /** @var Region $location */
        $location = Region::query()->find($id);

        if (empty($location)) {
            return $this->sendError('Region not found');
        }

        return $this->sendResponse($location->toArray(), 'Region retrieved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/locations/region/{id}/project_statistics",
     *      summary="Display Project statistics based on region",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Get Location",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of region",
     *          type="string",
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
     *                  ref="#/definitions/Location"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function project_statistics($id)
    {
        /** @var Region $location */
        $location = Region::query()->find($id);

        if (empty($location)) {
            return $this->sendError('Region not found');
        }

        return $this->sendResponse(Region::get_region_projects_statistics($id), 'Region project statistics retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateLocationAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/locations/{id}",
     *      summary="Update the specified Location in storage",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Update Location",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Location",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Location that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Location")
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
     *                  ref="#/definitions/Location"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateLocationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Location $location */
        $location = $this->locationRepository->find($id);

        if (empty($location)) {
            return $this->sendError('Location not found');
        }

        $location = $this->locationRepository->update($input, $id);

        return $this->sendResponse($location->toArray(), 'Location updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/locations/{id}",
     *      summary="Remove the specified Location from storage",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Delete Location",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Location",
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
        /** @var Location $location */
        $location = $this->locationRepository->find($id);

        if (empty($location)) {
            return $this->sendError('Location not found');
        }

        $location->delete();

        return $this->sendSuccess('Location deleted successfully');
    }
}
