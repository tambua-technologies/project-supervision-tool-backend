<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProcuringEntityPackageContractAPIRequest;
use App\Http\Requests\API\UpdateProcuringEntityPackageContractAPIRequest;
use App\Http\Resources\ProcuringEntityPackageContractResource;
use App\Imports\Packages\ProcuringEntityPackagesContractImport;
use App\Models\ProcuringEntityPackage;
use App\Models\ProcuringEntityPackageContract;
use App\Repositories\ProcuringEntityPackageContractRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ProcuringEntityPackageController
 * @package App\Http\Controllers\API
 */

class ProcuringEntityPackageContractAPIController extends AppBaseController
{
    /** @var  ProcuringEntityPackageContractRepository */
    private ProcuringEntityPackageContractRepository $procuringEntityPackageContractRepository;

    public function __construct(ProcuringEntityPackageContractRepository $procuringEntityPackageContractContractRepo)
    {
        $this->procuringEntityPackageContractRepository = $procuringEntityPackageContractContractRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/packages_contracts",
     *      summary="Get a listing of the Procuring Entities Packages Contracts.",
     *      tags={"ProcuringEntityPackageContracts"},
     *     security={{"Bearer":{}}},
     *      description="Get a listing of the Procuring Entities Packages Contracts.",
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
     *                  @SWG\Items(ref="#/definitions/ProcuringEntityPackageContract")
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
        $procuringEntityPackageContractContracts = $this->procuringEntityPackageContractRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ProcuringEntityPackageContractResource::collection($procuringEntityPackageContractContracts), 'Procuring Entities Packages Contracts retrieved successfully');
    }

    /**
     * @param CreateProcuringEntityPackageContractAPIRequest $request
     *
     * @SWG\Post(
     *      path="/packages_contracts",
     *      summary="Store a newly created ProcuringEntityPackageContract in storage",
     *      tags={"ProcuringEntityPackageContracts"},
     *     security={{"Bearer":{}}},
     *      description="Store ProcuringEntityPackageContract",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProcuringEntityPackageContract that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProcuringEntityPackageContractPayload")
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
     *                  ref="#/definitions/ProcuringEntityPackageContract"
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
    public function store(CreateProcuringEntityPackageContractAPIRequest $request): JsonResponse
    {
        $input = $request->all();
        $procuringEntityPackageContract = $this->procuringEntityPackageContractRepository->create($input);


        return $this->sendResponse(new ProcuringEntityPackageContractResource($procuringEntityPackageContract), 'Procuring EntityPackage Contract saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/packages_contracts/{id}",
     *      summary="Display the specified ProcuringEntityPackageContract",
     *      tags={"ProcuringEntityPackageContracts"},
     *     security={{"Bearer":{}}},
     *      description="Get ProcuringEntityPackageContract",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntityPackageContract",
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
     *                  ref="#/definitions/ProcuringEntityPackageContract"
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
        /** @var ProcuringEntityPackageContract $procuringEntityPackageContract */
        $procuringEntityPackageContract = $this->procuringEntityPackageContractRepository->find($id);

        if ($procuringEntityPackageContract === null) {
            return $this->sendError('Procuring EntityPackage Contract not found');
        }

        return $this->sendResponse(new ProcuringEntityPackageContractResource($procuringEntityPackageContract), 'Procuring EntityPackage Contract retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProcuringEntityPackageContractAPIRequest $request
     *
     * @SWG\Put(
     *      path="/packages_contracts/{id}",
     *      summary="Update the specified ProcuringEntityPackageContract in storage",
     *      tags={"ProcuringEntityPackageContracts"},
     *     security={{"Bearer":{}}},
     *      description="Update ProcuringEntityPackageContract",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntityPackageContract",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProcuringEntityPackageContract that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProcuringEntityPackageContractPayload")
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
     *                  ref="#/definitions/ProcuringEntityPackageContract"
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
    public function update(int $id, UpdateProcuringEntityPackageContractAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ProcuringEntityPackageContract $procuringEntityPackageContract */
        $procuringEntityPackageContract = $this->procuringEntityPackageContractRepository->find($id);

        if ($procuringEntityPackageContract === null) {
            return $this->sendError('Procuring EntityPackage contract not found');
        }

        $updatedProcuringEntityPackageContract = $this->procuringEntityPackageContractRepository->update($input, $id);



        return $this->sendResponse(new ProcuringEntityPackageContractResource($updatedProcuringEntityPackageContract), 'ProcuringEntityPackageContract updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/packages_contracts/{id}",
     *      summary="Remove the specified ProcuringEntityPackageContract from storage",
     *      tags={"ProcuringEntityPackageContracts"},
     *     security={{"Bearer":{}}},
     *      description="Delete ProcuringEntityPackageContract",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntityPackageContract",
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
        /** @var ProcuringEntityPackage $procuringEntityPackageContract */
        $procuringEntityPackageContract = $this->procuringEntityPackageContractRepository->find($id);

        if ($procuringEntityPackageContract === null) {
            return $this->sendError('Procuring EntityPackage Contract not found');
        }

        $procuringEntityPackageContract->delete();

        return $this->sendSuccess('Procuring EntityPackage Contract deleted successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Post(
     *      path="/packages_contracts/import",
     *      summary="import procuring entity package contracts",
     *      tags={"ProcuringEntityPackageContracts"},
     *     security={{"Bearer":{}}},
     *      description="Using excel bulk import procuring entity package contracts",
     *      produces={"application/json"},
     *     consumes={"multipart/form-data"},
     *      @SWG\Parameter(
     *          name="file",
     *          description="excel file with procuring entity package contracts data",
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
     * @return JsonResponse
     */
    public function import(Request $request): JsonResponse
    {
        Excel::import(new ProcuringEntityPackagesContractImport(), $request->file);
        return $this->sendSuccess('Procuring Entity package contracts have been created successfully');
    }

}
