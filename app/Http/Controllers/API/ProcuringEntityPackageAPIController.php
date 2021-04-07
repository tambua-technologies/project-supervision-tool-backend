<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProcuringEntityPackagesAPIRequest;
use App\Http\Requests\API\UpdateProcuringEntityPackagesAPIRequest;
use App\Http\Resources\ProcuringEntityPackageResource;
use App\Models\ProcuringEntityPackage;
use App\Repositories\ProcuringEntityPackageRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProcuringEntityPackagesController
 * @package App\Http\Controllers\API
 */

class ProcuringEntityPackageAPIController extends AppBaseController
{
    /** @var  ProcuringEntityPackageRepository */
    private $procuringEntityPackageRepository;

    public function __construct(ProcuringEntityPackageRepository $procuringEntityPackageRepo)
    {
        $this->procuringEntityPackageRepository = $procuringEntityPackageRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/procuring_entity_packages",
     *      summary="Get a listing of the ProcuringEntityPackages.",
     *      tags={"ProcuringEntityPackages"},
     *     security={{"Bearer":{}}},
     *      description="Get all ProcuringEntityPackages",
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
     *                  @SWG\Items(ref="#/definitions/ProcuringEntityPackage")
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
        $procuringEntityPackages = $this->procuringEntityPackageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ProcuringEntityPackageResource::collection($procuringEntityPackages), 'Procuring Entity packages retrieved successfully');
    }

    /**
     * @param CreateProcuringEntityPackagesAPIRequest $request
     *
     * @SWG\Post(
     *      path="/procuring_entity_packages",
     *      summary="Store a newly created ProcuringEntityPackages in storage",
     *      tags={"ProcuringEntityPackages"},
     *     security={{"Bearer":{}}},
     *      description="Store ProcuringEntityPackages",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProcuringEntityPackages that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProcuringEntityPackage")
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
     *                  ref="#/definitions/ProcuringEntityPackage"
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
    public function store(CreateProcuringEntityPackagesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $procuringEntityPackages = $this->procuringEntityPackageRepository->create($input);

        return $this->sendResponse($procuringEntityPackages->toArray(), 'ProcuringEntityPackage saved successfully');
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     * @SWG\Get(
     *      path="/procuring_entity_packages/{id}",
     *      summary="Display the specified ProcuringEntityPackages",
     *      tags={"ProcuringEntityPackages"},
     *     security={{"Bearer":{}}},
     *      description="Get ProcuringEntityPackages",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntityPackage",
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
     *                  ref="#/definitions/ProcuringEntityPackage"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show(int $id): JsonResponse
    {
        /** @var ProcuringEntityPackage $procuringEntityPackages */
        $procuringEntityPackage = $this->procuringEntityPackageRepository->find($id);

        if ($procuringEntityPackage === null) {
            return $this->sendError('ProcuringEntityPackage not found');
        }

        return $this->sendResponse($procuringEntityPackages->toArray(), 'ProcuringEntityPackage retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProcuringEntityPackagesAPIRequest $request
     *
     * @SWG\Put(
     *      path="/procuring_entity_packages/{id}",
     *      summary="Update the specified ProcuringEntityPackages in storage",
     *      tags={"ProcuringEntityPackages"},
     *     security={{"Bearer":{}}},
     *      description="Update ProcuringEntityPackages",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntityPackages",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProcuringEntityPackages that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProcuringEntityPackage")
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
     *                  ref="#/definitions/ProcuringEntityPackage"
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
    public function update(int $id, UpdateProcuringEntityPackagesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ProcuringEntityPackage $procuringEntityPackages */
        $procuringEntityPackage = $this->procuringEntityPackageRepository->find($id);

        if (empty($procuringEntityPackage)) {
            return $this->sendError('ProcuringEntityPackage not found');
        }

        $procuringEntityPackage = $this->procuringEntityPackageRepository->update($input, $id);

        return $this->sendResponse($procuringEntityPackage->toArray(), 'ProcuringEntityPackages updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/procuring_entity_packages/{id}",
     *      summary="Remove the specified ProcuringEntityPackages from storage",
     *      tags={"ProcuringEntityPackages"},
     *     security={{"Bearer":{}}},
     *      description="Delete ProcuringEntityPackages",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntityPackages",
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
        /** @var ProcuringEntityPackage $procuringEntityPackage */
        $procuringEntityPackage = $this->procuringEntityPackageRepository->find($id);

        if ($procuringEntityPackage === null) {
            return $this->sendError('procuring entity package not found');
        }

        $procuringEntityPackage->delete();

        return $this->sendSuccess('ProcuringEntityPackage deleted successfully');
    }
}