<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\SubProjects\SubProjectCollection;
use App\Imports\ProcuringEntities\SafeguardConcernsImport;
use App\Models\SafeguardConcern;
use App\Models\SubProject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Maatwebsite\Excel\Facades\Excel;
use Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class RoleController
 * @package App\Http\Controllers\API
 */

class SafeguardConcernsAPIController extends AppBaseController
{



    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/safeguard_concerns",
     *      summary="Get a listing of the Safeguard Concerns",
     *      tags={"SafeguardConcerns"},
     *     security={{"Bearer":{}}},
     *      description="Get all safeguard concerns",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="filter[procuring_entity_id]",
     *          description="filter by procuring entity",
     *          type="integer",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[package_id]",
     *          description="filter by packages",
     *          type="integer",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[concern_type]",
     *          description="filter by concern type",
     *          type="string",
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
     *                  @SWG\Items(ref="#/definitions/SafeguardConcern")
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
        $safeguardConcerns = QueryBuilder::for(SafeguardConcern::class)
            ->allowedFilters([
                AllowedFilter::exact('procuring_entity_id'),
                AllowedFilter::exact('package_id'),
                AllowedFilter::exact('concern_type'),
            ])
            ->with(['package'])
            ->paginate($request->get('per_page', 15));

        return $this->sendResponse($safeguardConcerns->toArray(), 'Safeguard concerns retrieved successfully');
    }



    /**
     *
     * @SWG\Post(
     *      path="/safeguard_concerns/import",
     *      summary="import safeguard concerns",
     *      tags={"SafeguardConcerns"},
     *     security={{"Bearer":{}}},
     *      description="insert safeguard concerns in bulk by importing them via excel file",
     *      produces={"application/json"},
     *     consumes={"multipart/form-data"},
     *
     *      @SWG\Parameter(
     *          name="file",
     *          description="excel file containing safeguard concerns to be imported",
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
        Excel::import(new SafeguardConcernsImport(), $request->file);

        return $this->sendSuccess('Safeguard Concerns have been imported successfully');
    }

}
