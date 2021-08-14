<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePackageContractFinancialAPIRequest;
use App\Http\Requests\API\UpdatePackageContractFinancialAPIRequest;
use App\Http\Resources\PackageContractFinancialResource;
use App\Models\PackageContractFinancial;
use App\Repositories\PackageContractFinancialRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class PackageContractFinancialController
 * @package App\Http\Controllers\API
 */

class PackageContractFinancialAPIController extends AppBaseController
{
    /** @var  PackageContractFinancialRepository */
    private PackageContractFinancialRepository $packageContractFinancialRepository;

    public function __construct(PackageContractFinancialRepository $packageContractFinancialRepo)
    {
        $this->packageContractFinancialRepository = $packageContractFinancialRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/package_contract_financials",
     *      summary="Get a listing of the PackageContractFinancials.",
     *      tags={"PackageContractFinancial"},
     *     security={{"Bearer":{}}},
     *      description="Get all PackageContractFinancials",
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
     *                  @SWG\Items(ref="#/definitions/PackageContractFinancial")
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
        $packageContractFinancial = $this->packageContractFinancialRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(PackageContractFinancialResource::collection($packageContractFinancial), 'PackageContractFinancials retrieved successfully');
    }

    /**
     * @param CreatePackageContractFinancialAPIRequest $request
     *
     * @SWG\Post(
     *      path="/package_contract_financials",
     *      summary="Store a newly created PackageContractFinancial in storage",
     *      tags={"PackageContractFinancial"},
     *     security={{"Bearer":{}}},
     *      description="Store PackageContractFinancial",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PackageContractFinancial that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PackageContractFinancialPayload")
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
     *                  ref="#/definitions/PackageContractFinancial"
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
    public function store(CreatePackageContractFinancialAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $packageContractFinancial = $this->packageContractFinancialRepository->create($input);

        return $this->sendResponse(new PackageContractFinancialResource($packageContractFinancial), 'PackageContractFinancial saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/package_contract_financials/{id}",
     *      summary="Display the specified PackageContractFinancial",
     *      tags={"PackageContractFinancial"},
     *     security={{"Bearer":{}}},
     *      description="Get PackageContractFinancial",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PackageContractFinancial",
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
     *                  ref="#/definitions/PackageContractFinancial"
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
        /** @var PackageContractFinancial $packageContractFinancial */
        $packageContractFinancial = $this->packageContractFinancialRepository->find($id);

        if ($packageContractFinancial === null) {
            return $this->sendError('PackageContractFinancial not found');
        }

        return $this->sendResponse(new PackageContractFinancialResource($packageContractFinancial), 'PackageContractFinancial retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePackageContractFinancialAPIRequest $request
     *
     * @SWG\Put(
     *      path="/package_contract_financials/{id}",
     *      summary="Update the specified PackageContractFinancial in storage",
     *      tags={"PackageContractFinancial"},
     *     security={{"Bearer":{}}},
     *      description="Update PackageContractFinancial",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PackageContractFinancial",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PackageContractFinancial that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PackageContractFinancial")
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
     *                  ref="#/definitions/PackageContractFinancial"
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
    public function update(int $id, UpdatePackageContractFinancialAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var PackageContractFinancial $packageContractFinancial */
        $packageContractFinancial = $this->packageContractFinancialRepository->find($id);

        if ($packageContractFinancial === null) {
            return $this->sendError('PackageContractFinancial not found');
        }

        $packageContractFinancial = $this->packageContractFinancialRepository->update($input, $id);

        return $this->sendResponse(new PackageContractFinancialResource($packageContractFinancial), 'PackageContractFinancial updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/package_contract_financials/{id}",
     *      summary="Remove the specified PackageContractFinancial from storage",
     *      tags={"PackageContractFinancial"},
     *     security={{"Bearer":{}}},
     *      description="Delete PackageContractFinancial",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PackageContractFinancial",
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
        /** @var PackageContractFinancial $packageContractFinancial */
        $packageContractFinancial = $this->packageContractFinancialRepository->find($id);

        if ($packageContractFinancial === null) {
            return $this->sendError('PackageContractFinancial not found');
        }

        $packageContractFinancial->delete();

        return $this->sendSuccess('PackageContractFinancial deleted successfully');
    }
}
