<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePackageContractStaffAPIRequest;
use App\Http\Requests\API\UpdatePackageContractStaffAPIRequest;
use App\Http\Resources\PackageContractStaffResource;
use App\Models\PackageContractStaffs;
use App\Repositories\PackageContractStaffRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class PackageContractStaffController
 * @package App\Http\Controllers\API
 */

class PackageContractStaffAPIController extends AppBaseController
{
    /** @var  PackageContractStaffRepository */
    private PackageContractStaffRepository $packageContractStaffRepository;

    public function __construct(PackageContractStaffRepository $packageContractStaffRepo)
    {
        $this->packageContractStaffRepository = $packageContractStaffRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/package_contract_staffs",
     *      summary="Get a listing of the PackageContractStaff.",
     *      tags={"PackageContractStaff"},
     *     security={{"Bearer":{}}},
     *      description="Get all PackageContractStaffs",
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
     *                  @SWG\Items(ref="#/definitions/PackageContractStaff")
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
        $packageContractStaff = $this->packageContractStaffRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(PackageContractStaffResource::collection($packageContractStaff), 'PackageContractStaffs retrieved successfully');
    }

    /**
     * @param CreatePackageContractStaffAPIRequest $request
     *
     * @SWG\Post(
     *      path="/package_contract_staffs",
     *      summary="Store a newly created PackageContractStaff in storage",
     *      tags={"PackageContractStaff"},
     *     security={{"Bearer":{}}},
     *      description="Store PackageContractStaff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PackageContractStaff that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PackageContractStaffPayload")
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
     *                  ref="#/definitions/PackageContractStaff"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePackageContractStaffAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $packageContractStaff = $this->packageContractStaffRepository->create($input);

        return $this->sendResponse(new PackageContractStaffResource($packageContractStaff), 'PackageContractStaff saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/package_contract_staffs/{id}",
     *      summary="Display the specified PackageContractStaff",
     *      tags={"PackageContractStaff"},
     *     security={{"Bearer":{}}},
     *      description="Get PackageContractStaff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PackageContractStaff",
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
     *                  ref="#/definitions/PackageContractStaff"
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
    public function show($id): JsonResponse
    {
        /** @var PackageContractStaffs $packageContractStaff */
        $packageContractStaff = $this->packageContractStaffRepository->find($id);

        if ($packageContractStaff === null) {
            return $this->sendError('PackageContractStaff not found');
        }

        return $this->sendResponse(new PackageContractStaffResource($packageContractStaff), 'PackageContractStaff retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePackageContractStaffAPIRequest $request
     *
     * @SWG\Put(
     *      path="/package_contract_staffs/{id}",
     *      summary="Update the specified PackageContractStaff in storage",
     *      tags={"PackageContractStaff"},
     *     security={{"Bearer":{}}},
     *      description="Update PackageContractStaff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PackageContractStaff",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PackageContractStaff that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PackageContractStaff")
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
     *                  ref="#/definitions/PackageContractStaff"
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
    public function update(int $id, UpdatePackageContractStaffAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var PackageContractStaffs $packageContractStaff */
        $packageContractStaff = $this->packageContractStaffRepository->find($id);

        if ($packageContractStaff === null) {
            return $this->sendError('PackageContractStaff not found');
        }

        $packageContractStaff = $this->packageContractStaffRepository->update($input, $id);

        return $this->sendResponse(new PackageContractStaffResource($packageContractStaff), 'PackageContractStaff updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/package_contract_staffs/{id}",
     *      summary="Remove the specified PackageContractStaff from storage",
     *      tags={"PackageContractStaff"},
     *     security={{"Bearer":{}}},
     *      description="Delete PackageContractStaff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PackageContractStaff",
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
        /** @var PackageContractStaffs $packageContractStaff */
        $packageContractStaff = $this->packageContractStaffRepository->find($id);

        if ($packageContractStaff === null) {
            return $this->sendError('PackageContractStaff not found');
        }

        $packageContractStaff->delete();

        return $this->sendSuccess('PackageContractStaff deleted successfully');
    }
}
