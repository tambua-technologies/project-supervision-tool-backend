<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePackageContractEquipmentAPIRequest;
use App\Http\Requests\API\UpdatePackageContractEquipmentAPIRequest;
use App\Http\Resources\PackageContractEquipmentResource;
use App\Imports\Packages\PackageContractEquipmentImport;
use App\Models\PackageContractEquipment;
use App\Repositories\PackageContractEquipmentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class PackageContractEquipmentController
 * @package App\Http\Controllers\API
 */

class PackageContractEquipmentAPIController extends AppBaseController
{
    /** @var  PackageContractEquipmentRepository */
    private PackageContractEquipmentRepository $packageContractEquipmentRepository;

    public function __construct(PackageContractEquipmentRepository $packageContractEquipmentRepo)
    {
        $this->packageContractEquipmentRepository = $packageContractEquipmentRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/package_contract_equipments",
     *      summary="Get a listing of the PackageContractEquipments.",
     *      tags={"PackageContractEquipment"},
     *     security={{"Bearer":{}}},
     *      description="Get all PackageContractEquipments",
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
     *                  @SWG\Items(ref="#/definitions/PackageContractEquipment")
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
        $packageContractEquipment = $this->packageContractEquipmentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(PackageContractEquipmentResource::collection($packageContractEquipment), 'PackageContractEquipments retrieved successfully');
    }

    /**
     * @param CreatePackageContractEquipmentAPIRequest $request
     *
     * @SWG\Post(
     *      path="/package_contract_equipments",
     *      summary="Store a newly created PackageContractEquipment in storage",
     *      tags={"PackageContractEquipment"},
     *     security={{"Bearer":{}}},
     *      description="Store PackageContractEquipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PackageContractEquipment that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PackageContractEquipmentPayload")
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
     *                  ref="#/definitions/PackageContractEquipment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePackageContractEquipmentAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $packageContractEquipment = $this->packageContractEquipmentRepository->create($input);

        return $this->sendResponse(new PackageContractEquipmentResource($packageContractEquipment), 'PackageContractEquipment saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/package_contract_equipments/{id}",
     *      summary="Display the specified PackageContractEquipment",
     *      tags={"PackageContractEquipment"},
     *     security={{"Bearer":{}}},
     *      description="Get PackageContractEquipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PackageContractEquipment",
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
     *                  ref="#/definitions/PackageContractEquipment"
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
        /** @var PackageContractEquipment $packageContractEquipment */
        $packageContractEquipment = $this->packageContractEquipmentRepository->find($id);

        if ($packageContractEquipment === null) {
            return $this->sendError('PackageContractEquipment not found');
        }

        return $this->sendResponse(new PackageContractEquipmentResource($packageContractEquipment), 'PackageContractEquipment retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePackageContractEquipmentAPIRequest $request
     *
     * @SWG\Put(
     *      path="/package_contract_equipments/{id}",
     *      summary="Update the specified PackageContractEquipment in storage",
     *      tags={"PackageContractEquipment"},
     *     security={{"Bearer":{}}},
     *      description="Update PackageContractEquipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PackageContractEquipment",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PackageContractEquipment that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PackageContractEquipment")
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
     *                  ref="#/definitions/PackageContractEquipment"
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
    public function update(int $id, UpdatePackageContractEquipmentAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var PackageContractEquipment $packageContractEquipment */
        $packageContractEquipment = $this->packageContractEquipmentRepository->find($id);

        if ($packageContractEquipment === null) {
            return $this->sendError('PackageContractEquipment not found');
        }

        $packageContractEquipment = $this->packageContractEquipmentRepository->update($input, $id);

        return $this->sendResponse(new PackageContractEquipmentResource($packageContractEquipment), 'PackageContractEquipment updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/package_contract_equipments/{id}",
     *      summary="Remove the specified PackageContractEquipment from storage",
     *      tags={"PackageContractEquipment"},
     *     security={{"Bearer":{}}},
     *      description="Delete PackageContractEquipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PackageContractEquipment",
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
     * @return mixed
     */
    public function destroy(int $id)
    {
        /** @var PackageContractEquipment $packageContractEquipment */
        $packageContractEquipment = $this->packageContractEquipmentRepository->find($id);

        if ($packageContractEquipment === null) {
            return $this->sendError('PackageContractEquipment not found');
        }

        $packageContractEquipment->delete();

        return $this->sendSuccess('PackageContractEquipment deleted successfully');
    }



    /**
     *
     * @SWG\Post(
     *      path="/package_contract_equipments/import",
     *      summary="import package contract equiments",
     *      tags={"PackageContractEquipment"},
     *     security={{"Bearer":{}}},
     *      description="insert package contract equiments in bulk by importing them via excel file",
     *      produces={"application/json"},
     *     consumes={"multipart/form-data"},
     *
     *      @SWG\Parameter(
     *          name="file",
     *          description="excel file containing package contract equipments to be imported",
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
        Excel::import(new PackageContractEquipmentImport(), $request->file);

        return $this->sendSuccess('Package contract equipments have been imported successfully');
    }



}
