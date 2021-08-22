<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProcuringEntityAPIRequest;
use App\Http\Requests\API\UpdateProcuringEntityAPIRequest;
use App\Http\Resources\ProcuringEntityResource;
use App\Models\ProcuringEntity;
use App\Repositories\ProcuringEntityRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
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
}
