<?php

namespace App\Http\Controllers\API;

use App\Exports\ExportReport;
use App\Http\Requests\API\CreateProgressAPIRequest;
use App\Http\Requests\API\UpdateProgressAPIRequest;
use App\Models\ProcuringEntityReport;
use App\Models\Progress;
use App\Repositories\ProgressRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Log;
use Response;

/**
 * Class ProgressController
 * @package App\Http\Controllers\API
 */

class ProcuringEntityReportsAPIController extends AppBaseController
{

    public function __construct()
    {

    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/procuring_entity_reports",
     *      summary="Get a listing of the procuring entity reports.",
     *      tags={"ProcuringEntityReport"},
     *     security={{"Bearer":{}}},
     *      description="Get all reports",
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
     *                  @SWG\Items(ref="#/definitions/ProcuringEntityReport")
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
        $reports = ProcuringEntityReport::all();

        return $this->sendResponse($reports->toArray(), 'Procuring Entity Reports retrieved successfully');
    }

    /**
     *
     * @SWG\Post(
     *      path="/procuring_entity_reports",
     *      summary="Store a newly created procuring entity report in storage",
     *      tags={"ProcuringEntityReport"},
     *     security={{"Bearer":{}}},
     *      description="Store Procuring Entity Report",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Report that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProcuringEntityReport")
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
     *                  ref="#/definitions/ProcuringEntityReport"
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
    public function store( Request $request): JsonResponse
    {
        $input = $request->all();

        $report = ProcuringEntityReport::create($input);

        // generate word report.
        ExportReport::create($report->procuring_entity_id, $report->id);
        return $this->sendResponse($report->toArray(), 'Report saved successfully');
    }


}
