<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProcuringEntityAPIRequest;
use App\Http\Requests\API\UpdateProcuringEntityAPIRequest;
use App\Http\Resources\ProcuringEntityResource;
use App\Models\Challenge;
use App\Models\Contractor;
use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityPackage;
use App\Models\SafeguardConcern;
use App\Repositories\ProcuringEntityRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ProcuringEntityController
 * @package App\Http\Controllers\API
 */

class ProcuringEntityAPIController extends AppBaseController
{
    /** @var  ProcuringEntityRepository */
    private ProcuringEntityRepository $procuringEntityRepository;


    public function __construct(ProcuringEntityRepository $procuringEntityRepo)
    {
        $this->procuringEntityRepository = $procuringEntityRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/procuring_entities",
     *      summary="Get a listing of the ProcuringEntitys.",
     *      tags={"ProcuringEntity"},
     *     security={{"Bearer":{}}},
     *      description="Get all ProcuringEntitys",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="filter[project_id]",
     *          description="filter procuring entities by project id",
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
     *                  @SWG\Items(ref="#/definitions/ProcuringEntity")
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
        $procuringEntities = QueryBuilder::for(ProcuringEntity::class)
            ->allowedFilters([
                AllowedFilter::exact('project_id')
            ])
            ->with('packages')
            ->get();
        return $this->sendResponse(ProcuringEntityResource::collection($procuringEntities), 'Procuring Entitys retrieved successfully');
    }

    /**
     * @param CreateProcuringEntityAPIRequest $request
     *
     * @SWG\Post(
     *      path="/procuring_entities",
     *      summary="Store a newly created ProcuringEntity in storage",
     *      tags={"ProcuringEntity"},
     *     security={{"Bearer":{}}},
     *      description="Store ProcuringEntity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProcuringEntity that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProcuringEntityPayload")
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
     *                  ref="#/definitions/ProcuringEntity"
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
    public function store(CreateProcuringEntityAPIRequest $request): JsonResponse
    {
        $input = $request->all();
        $procured_project_components = $request->procured_project_components;
        $procured_project_sub_components = $request->procured_project_sub_components;
        $procuringEntity = $this->procuringEntityRepository->create($input);

           if ($procured_project_components) {
               $procuringEntity->procuredProjectComponents()->detach($procured_project_components);
               $procuringEntity->procuredProjectComponents()->attach($procured_project_components);
           }

           if ($procured_project_sub_components) {
               $procuringEntity->procuredProjectSubComponents()->detach($procured_project_sub_components);
               $procuringEntity->procuredProjectSubComponents()->attach($procured_project_sub_components);
           }




        return $this->sendResponse(new ProcuringEntityResource($procuringEntity), 'Procuring Entity saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/procuring_entities/{id}",
     *      summary="Display the specified ProcuringEntity",
     *      tags={"ProcuringEntity"},
     *     security={{"Bearer":{}}},
     *      description="Get ProcuringEntity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntity",
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
     *                  ref="#/definitions/ProcuringEntity"
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
    public function show(int $id): JsonResponse
    {
        /** @var ProcuringEntity $procuringEntity */
        $procuringEntity = $this->procuringEntityRepository->find($id);

        if ($procuringEntity === null) {
            return $this->sendError('Procuring Entity not found');
        }

        return $this->sendResponse(new ProcuringEntityResource($procuringEntity), 'Procuring Entity retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProcuringEntityAPIRequest $request
     *
     * @SWG\Put(
     *      path="/procuring_entities/{id}",
     *      summary="Update the specified ProcuringEntity in storage",
     *      tags={"ProcuringEntity"},
     *     security={{"Bearer":{}}},
     *      description="Update ProcuringEntity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntity",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProcuringEntity that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProcuringEntity")
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
     *                  ref="#/definitions/ProcuringEntity"
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
    public function update(int $id, UpdateProcuringEntityAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ProcuringEntity $procuringEntity */
        $procuringEntity = $this->procuringEntityRepository->find($id);

        if ($procuringEntity === null) {
            return $this->sendError('Procuring Entity not found');
        }

        $procuringEntity = $this->procuringEntityRepository->update($input, $id);

        return $this->sendResponse(new ProcuringEntityResource($procuringEntity), 'ProcuringEntity updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/procuring_entities/{id}",
     *      summary="Remove the specified ProcuringEntity from storage",
     *      tags={"ProcuringEntity"},
     *     security={{"Bearer":{}}},
     *      description="Delete ProcuringEntity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntity",
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
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        /** @var ProcuringEntity $procuringEntity */
        $procuringEntity = $this->procuringEntityRepository->find($id);

        if ($procuringEntity === null) {
            return $this->sendError('Procuring Entity not found');
        }

        $procuringEntity->delete();

        return $this->sendSuccess('Procuring Entity deleted successfully');
    }


    /**
     *
     * @SWG\Get(
     *      path="/procuring_entities/statistics/{id}",
     *      summary="Display statistics for a procuring entity",
     *      tags={"ProcuringEntity"},
     *     security={{"Bearer":{}}},
     *      description="Display statistics for a procuring entity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntity",
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
     *                  ref="#/definitions/ProcuringEntity"
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
    public function statistics($id): JsonResponse
    {
        $procuringEntity = ProcuringEntity::find($id);
        $packages = $procuringEntity->packages()->count();
        $subProjects = $procuringEntity->subProjects()->count();
        $contractors = DB::select("select count(*) total from contractors
join procuring_entity_package_contracts pepc on contractors.id = pepc.contractor_id
join procuring_entity_packages pep on pepc.procuring_entity_package_id = pep.id
where pep.procuring_entity_id = $procuringEntity->id");
        $package_progress = DB::select("select distinct on (pep.id) pep.id package_id,package_contract_progress.*, pep.name package_name, pep.description package_description
from package_contract_progress
join procuring_entity_package_contracts pepc on pepc.id = package_contract_progress.package_contract_id
join procuring_entity_packages pep on pep.id = pepc.procuring_entity_package_id
where pep.procuring_entity_id = $procuringEntity->id
");

        $reports = $procuringEntity->reports()->orderBy('created_at', 'DESC')->take(5)->get();

        return $this->sendResponse([
            'packages' => $packages,
            'contractors' => $contractors[0]->total,
            'subProjects' => $subProjects,
            'reports' => $reports,
            'package_progress' => $package_progress
        ],
            'ProcuringEntity statistics fetched successfully');


    }


    /**
     *
     * @SWG\Get(
     *      path="/procuring_entities/{id}/safeguard_concerns/statistics",
     *      summary="Display statistics for a procuring entity safeguard concerns",
     *      tags={"ProcuringEntity"},
     *     security={{"Bearer":{}}},
     *      description="Display statistics for a procuring entity safeguard concerns",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntity",
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
     *                  ref="#/definitions/ProcuringEntity"
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
    public function safeguardConcernsStatistics($id): JsonResponse
    {
        $procuringEntity = ProcuringEntity::find($id);
        $concerns = SafeguardConcern::where('procuring_entity_id', $id)->get();
        $environmental = 0;
        $social = 0;
        $healthAndSafety = 0;
        $other = 0;

        foreach ($concerns as $concern) {
            switch ($concern->concern_type)
            {
                case 'environmental':
                    $environmental++;
                    break;
                case 'social':
                    $social++;
                    break;
                case 'healthy and safety':
                    $healthAndSafety++;
                    break;
                default:
                    $other++;

            }
        }

        $latestReport = $procuringEntity->reports()->orderBy('created_at', 'DESC')->first();

        return $this->sendResponse([
        'environmental_concerns_count' => $environmental,
        'social_concerns_count' => $social,
        'health_and_safety_concerns_count' => $healthAndSafety,
        'other_concerns' => $other,
        'latestReport' => $latestReport
    ],
        'ProcuringEntity safeguard concerns statistics fetched successfully');

    }

    /**
     *
     * @SWG\Get(
     *      path="/procuring_entities/{id}/packages/statistics",
     *      summary="Display statistics for a procuring entity packages",
     *      tags={"ProcuringEntity"},
     *     security={{"Bearer":{}}},
     *      description="Display statistics for a procuring entity packages",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntity",
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
     *                  ref="#/definitions/ProcuringEntity"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @param $id
     * @return JsonResponse
     */
    public function packagesStatistics($id): JsonResponse
    {
        $procuringEntity = ProcuringEntity::find($id);
        $package_progress = DB::select("select distinct on (pep.id) pep.id package_id,package_contract_progress.*, pep.name package_name, pep.description package_description
from package_contract_progress
join procuring_entity_package_contracts pepc on pepc.id = package_contract_progress.package_contract_id
join procuring_entity_packages pep on pep.id = pepc.procuring_entity_package_id
where pep.procuring_entity_id = $procuringEntity->id
");

        $challenges = $procuringEntity->getPackageChallengesCount();
        $inProgress = 0;
        $completed = 0;

        foreach ($package_progress as $progress) {
            if ($progress->actual_physical_progress === 100)
            {
                $completed++;
            }
            else {
                $inProgress++;
            }
        }

        $latestReport = $procuringEntity->reports()->orderBy('created_at', 'DESC')->first();

        return $this->sendResponse([
        'in_progress' => $inProgress,
        'completed' => $completed,
        'challenges' => $challenges,
        'latestReport' => $latestReport
    ],
        'ProcuringEntity package statistics fetched successfully');

    }
}
