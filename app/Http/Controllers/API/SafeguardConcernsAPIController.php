<?php

namespace App\Http\Controllers\API;

use App\Imports\ProcuringEntities\SafeguardConcernsImport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Maatwebsite\Excel\Facades\Excel;
use Response;

/**
 * Class RoleController
 * @package App\Http\Controllers\API
 */

class SafeguardConcernsAPIController extends AppBaseController
{

    public function __construct()
    {

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
