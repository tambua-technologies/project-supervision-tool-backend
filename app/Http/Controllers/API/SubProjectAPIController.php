<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubProjectAPIRequest;
use App\Http\Requests\API\UpdateSubProjectAPIRequest;
use App\Http\Resources\SubProjects\SubProjectTicketResource;
use App\Http\Resources\SubProjects\SubProjectCollection;
use App\Http\Resources\SubProjects\SubProjectResource;
use App\Imports\SubProjects\SubProjectsImport;
use App\Models\SubProject;
use App\Repositories\SubProjectRepository;
use App\Repositories\TicketRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


/**
 * Class SubProjectController
 * @package App\Http\Controllers\API
 */

class SubProjectAPIController extends AppBaseController
{
    /** @var  SubProjectRepository */
    private SubProjectRepository $subProjectRepository;
    private TicketRepository $ticketRepository;


    public function __construct(SubProjectRepository $subProjectRepo, TicketRepository $ticketRepo)
    {
        $this->subProjectRepository = $subProjectRepo;
        $this->ticketRepository = $ticketRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/sub_projects",
     *      summary="Get a listing of the SubProject",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *      description="Get all SubProjects",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="filter[sub_project_type_id]",
     *          description="sub project type filter",
     *          type="integer",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[sub_project_status_id]",
     *          description="sub project status  filter",
     *          type="integer",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[procuring_entity_package_id]",
     *          description="sub project procuring entity package  filter",
     *          type="integer",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[districts.id]",
     *          description="sub project districts filter",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[districts.region_id]",
     *          description="sub project regions filter",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[procuringEntityPackage.procuring_entity_id]",
     *          description="sub project procuring entity filter",
     *          type="integer",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[procuringEntityPackage.contract.contractor_id]",
     *          description="sub project contractors filter",
     *          type="integer",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[procuringEntityPackage.procuringEntity.project_sub_component_id]",
     *          description="sub project procuring entity sub component filter",
     *          type="integer",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[project_id]",
     *          description="filter sub projects  by project",
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
     *                  @SWG\Items(ref="#/definitions/SubProject")
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
    public function index(Request $request): JsonResponse
    {
        $subProjects = QueryBuilder::for(SubProject::class)
            ->allowedFilters([
                AllowedFilter::exact('sub_project_status_id'),
                AllowedFilter::exact('sub_project_type_id'),
                AllowedFilter::exact('procuring_entity_package_id'),
                AllowedFilter::exact('districts.id'),
                AllowedFilter::exact('project_id'),
                AllowedFilter::exact('districts.region_id'),
                AllowedFilter::exact('procuringEntityPackage.procuring_entity_id'),
                AllowedFilter::exact('procuringEntityPackage.contract.contractor_id'),
                AllowedFilter::exact('procuringEntityPackage.procuringEntity.project_sub_component_id'),
                AllowedFilter::exact('procuringEntityPackage.procuringEntity.projectSubComponent.project_component_id'),
            ])
            ->with(['procuringEntity.agency', 'procuringEntityPackage.contract'])
            ->paginate($request->get('per_page', 15));


        return $this->sendResponse(new SubProjectCollection($subProjects), 'Sub Projects retrieved successfully');
    }


    /**
     *
     * @SWG\Post(
     *      path="/sub_projects/create_ticket",
     *      summary="Create a new ticket associated with  a sub project",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *      description="Create a new ticket in a SubProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProject that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectTicketPayload")
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
     *                  ref="#/definitions/SubProjectTicket"
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
    public function createTicket(Request $request): JsonResponse
    {
        $input = $request->all();
        $code = $this->ticketRepository->code();
        $input['code'] = $code;
        $projectTicket = $this->ticketRepository->create($input);
        return $this->sendResponse(new SubProjectTicketResource($projectTicket), 'Project Ticket created successfully');
    }


    /**
     *
     * @SWG\Get(
     *      path="/sub_projects/{id}/tickets",
     *      summary="Gets all tickets in a sub project",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *      description="Gets all tickets in a sub project",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProject",
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
     *                  ref="#/definitions/SubProjectTicket"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @param int $id
     * @return JsonResponse
     */
    public function tickets(int $id): JsonResponse
    {
        /** @var SubProject $subProject */
        $subProject = $this->subProjectRepository->find($id);

        if ($subProject === null) {
            return $this->sendError('SubProject not found');
        }

        $tickets = $subProject->tickets()->get();

        return $this->sendResponse(SubProjectTicketResource::collection($tickets), 'SubProject Tickets retrieved successfully');
    }


    /**
     * @param CreateSubProjectAPIRequest $request
     *
     * @SWG\Post(
     *      path="/sub_projects",
     *      summary="Store a newly created SubProject in storage",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *      description="Store SubProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProject that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectPayload")
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
     * @return JsonResponse
     */
    public function store(CreateSubProjectAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $subProject = $this->subProjectRepository->create($input);
        return $this->sendResponse(new SubProjectResource($subProject), 'Sub Project saved successfully');
    }

    /**
     * @param string $id
     *
     * @SWG\Get(
     *      path="/sub_projects/{id}",
     *      summary="Display the specified SubProject",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
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
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        /** @var SubProject $subProject */
        $subProject = SubProject::find($id)->with(['procuringEntity.agency', 'procuringEntityPackage.contract'])->first();

        if ($subProject === null) {
            return $this->sendError('Sub Project not found');
        }

        return $this->sendResponse(new SubProjectResource($subProject), 'Sub Project retrieved successfully');
    }



    /**
     *
     * @SWG\Get(
     *      path="/sub_projects/statistics",
     *      summary="Get SubProject(s) statistics",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *      description="Get SubProject(s) statistics",
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
    public function statistics(): JsonResponse
    {

        return $this->sendResponse(SubProject::statistics(), 'SubProjects statistics retrieved');
    }


    /**
     * @param int $id
     * @param UpdateSubProjectAPIRequest $request
     *
     * @return JsonResponse
     * @SWG\Put(
     *      path="/sub_projects/{id}",
     *      summary="Update the specified SubProject in storage",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
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
     *          @SWG\Schema(ref="#/definitions/SubProjectPayload")
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
    public function update(int $id, UpdateSubProjectAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var SubProject $subProject */
        $subProject = $this->subProjectRepository->find($id);

        if ($subProject === null) {
            return $this->sendError('Sub Project not found');
        }

        $subProject = $this->subProjectRepository->update($input, $id);

        return $this->sendResponse(new SubProjectResource($subProject), 'SubProject updated successfully');
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     * @SWG\Delete(
     *      path="/sub_projects/{id}",
     *      summary="Remove the specified SubProject from storage",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
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
    public function destroy(int $id): JsonResponse
    {
        /** @var SubProject $subProject */
        $subProject = $this->subProjectRepository->find($id);

        if ($subProject === null) {
            return $this->sendError('Sub Project not found');
        }

        $subProject->delete();

        return $this->sendSuccess('Sub Project deleted successfully');
    }


    /**
     *
     * @SWG\Post(
     *      path="/sub_projects/import",
     *      summary="import sub-projects",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *      description="insert sub-projects in bulky by importing them via excel file",
     *      produces={"application/json"},
     *     consumes={"multipart/form-data"},
     *
     *      @SWG\Parameter(
     *          name="file",
     *          description="excel file containing sub-projects to be imported",
     *          type="file",
     *          required=true,
     *          in="formData"
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
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function import(Request $request): JsonResponse
    {
        Excel::import(new SubProjectsImport(), $request->file);


        return $this->sendSuccess('sub-projects have been imported successfully');
    }
}
