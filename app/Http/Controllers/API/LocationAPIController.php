<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLocationAPIRequest;
use App\Http\Requests\API\UpdateLocationAPIRequest;
use App\Http\Resources\Locations\LocationResource;
use App\Http\Resources\Projects\ProjectOverview;
use App\Http\Resources\Projects\ProjectOverviewWithLocation;
use App\Http\Resources\SimpleLocationResource;
use App\Http\Resources\SubProjectResource;
use App\Models\District;
use App\Models\Location;
use App\Models\ProcuringEntity;
use App\Models\Region;
use App\Repositories\LocationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

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
     *
     * @SWG\Get(
     *      path="/locations/regions",
     *      summary="Get a listing of the regions.",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Get all regions",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="filter[projects.id]",
     *          description="filter regions by project id",
     *          type="integer",
     *          required=false,
     *          in="query"
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
     * @param Request $request
     * @return JsonResponse
     */
    public function regions(Request $request): JsonResponse
    {
        $locations = QueryBuilder::for(Region::class)
            ->allowedFilters([
                AllowedFilter::exact('projects.id')
            ])
            ->get();

        return $this->sendResponse(SimpleLocationResource::collection($locations), 'Regions retrieved successfully');
    }

    /**
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
    public function projectsOverviewPerRegion(): JsonResponse
    {
        $projectsOverview = Region::projectsOverview();

        return $this->sendResponse(ProjectOverview::collection($projectsOverview), 'Projects Overview retrieved successfully');
    }

    /**
     *
     * @SWG\Get(
     *      path="/locations/districts/sub_projects_overview",
     *      summary="Get an overview of sub projects per district ",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Get an overview of sub projects per districts",
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
    public function subProjectsOverviewPerDistrict(): JsonResponse
    {
        $subProjectsOverview = District::subProjectsOverview();

        return $this->sendResponse($subProjectsOverview, 'SubProjects Overview retrieved successfully');
    }


    /**
     *
     * @SWG\Get(
     *      path="/locations/sub_projects_overview_by_region/{region_id}",
     *      summary="Get SubProject(s) overview per region",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Get SubProject(s) overview per region",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="region_id",
     *          description="id of region",
     *          type="string",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *      )
     * )
     * @param string $region_id
     * @return JsonResponse
     */
    public function subProjectsOverViewByRegion(string $region_id): JsonResponse
    {
        /** @var Region $region */
        $region = Region::find($region_id);

        if (empty($region)) {
            return $this->sendError('Region not found');
        }

        return $this->sendResponse(District::subProjectsOverviewPerRegion($region_id), 'SubProjects overview retrieved');
    }

    /**
     *
     * @SWG\Get(
     *      path="/locations/regions/sub_projects_overview",
     *      summary="Get an overview of sub projects per region ",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Get an overview of sub projects per region",
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
    public function subProjectsOverviewPerRegion(): JsonResponse
    {
        $subProjectsOverview = Region::subProjectsOverview();

        return $this->sendResponse($subProjectsOverview, 'SubProjects Overview retrieved successfully');
    }

    /**
     * @param $region_id
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
     * @return JsonResponse
     */
    public function getProjectsByRegion($region_id): JsonResponse
    {
        $projectsOverview = Region::getProjects($region_id);

        return $this->sendResponse(ProjectOverviewWithLocation::collection($projectsOverview), 'Region projects retrieved successfully');
    }

    /**
     * @param string $district_id
     * @return JsonResponse
     * @SWG\Get(
     *      path="/locations/districts/{district_id}/sub_projects",
     *      summary="get sub projects  based on district",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description=" get sub projects  based on district ",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="district_id",
     *          description="id of District",
     *          type="string",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *      )
     * )
     */
    public function getSubProjectsByDistrict(string $district_id): JsonResponse
    {
        /** @var District $district */
        $district = District::find($district_id);

        if (empty($district)) {
            return $this->sendError('District not found');
        }

        $subProjectsOverview = District::getSubProjects($district_id);

        return $this->sendResponse(SubProjectResource::collection($subProjectsOverview), 'District sub projects retrieved successfully');
    }





    /**
     * @param $region_id
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
     * @return JsonResponse
     */
    public function districts($region_id): JsonResponse
    {
        $locations = District::query()->where('region_id', $region_id)->get();

        return $this->sendResponse(SimpleLocationResource::collection($locations), 'Districts retrieved successfully');
    }

    /**
     * @param CreateLocationAPIRequest $request
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
     * @return JsonResponse
     */
    public function store(CreateLocationAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $location = $this->locationRepository->create($input);

        return $this->sendResponse($location->toArray(), 'Location saved successfully');
    }

    /**
     * @param string $id
     *
     * @return JsonResponse
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
    public function show(string $id): JsonResponse
    {
        /** @var Location $location */
        $location = $this->locationRepository->find($id);

        if (empty($location)) {
            return $this->sendError('Location not found');
        }

        return $this->sendResponse($location->toArray(), 'Location retrieved successfully');
    }



    /**
     * @param string $id
     *
     * @return JsonResponse
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
    public function getRegion(string $id): JsonResponse
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
     * @return JsonResponse
     */
    public function project_statistics(string $id): JsonResponse
    {
        /** @var Region $location */
        $location = Region::query()->find($id);

        if (empty($location)) {
            return $this->sendError('Region not found');
        }

        return $this->sendResponse(Region::get_region_projects_statistics($id), 'Region project statistics retrieved successfully');
    }

    /**
     *
     * @SWG\Get(
     *      path="/locations/region/{id}/sub_project_statistics",
     *      summary="Display SubProject statistics based on region",
     *      tags={"Location"},
     *     security={{"Bearer":{}}},
     *      description="Display SubProject statistics based on region",
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
     * @param string $id
     * @return JsonResponse
     */
    public function sub_project_statistics(string $id): JsonResponse
    {
        /** @var Region $location */
        $location = Region::query()->find($id);

        if (empty($location)) {
            return $this->sendError('Region not found');
        }

        return $this->sendResponse(Region::get_region_sub_projects_statistics($id), 'Region sub project statistics retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateLocationAPIRequest $request
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
     * @return JsonResponse
     */
    public function update(string $id, UpdateLocationAPIRequest $request): JsonResponse
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
     * @param string $id
     *
     * @return JsonResponse
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
    public function destroy(string $id): JsonResponse
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
