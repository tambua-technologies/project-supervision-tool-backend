<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProcuringEntityContractAPIRequest;
use App\Http\Requests\API\UpdateProcuringEntityContractAPIRequest;
use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityContract;
use App\Repositories\ProcuringEntityContractRepository ;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ProcuringEntityController
 * @package App\Http\Controllers\API
 */

class ProcuringEntityContractAPIController extends AppBaseController
{
    /** @var  ProcuringEntityContractRepository */
    private ProcuringEntityContractRepository $procuringEntityContractRepository;

    public function __construct(ProcuringEntityContractRepository $procuringEntityContractContractRepo)
    {
        $this->procuringEntityContractRepository = $procuringEntityContractContractRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/procuring_entities_contracts",
     *      summary="Get a listing of the Procuring Entities Contracts.",
     *      tags={"ProcuringEntityContracts"},
     *     security={{"Bearer":{}}},
     *      description="Get a listing of the Procuring Entities Contracts.",
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
     *                  @SWG\Items(ref="#/definitions/ProcuringEntityContract")
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
        $procuringEntityContractContracts = $this->procuringEntityContractRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($procuringEntityContractContracts->toArray(), 'Procuring Entities Contracts retrieved successfully');
    }

    /**
     * @param CreateProcuringEntityContractAPIRequest $request
     *
     * @SWG\Post(
     *      path="/procuring_entities_contracts",
     *      summary="Store a newly created ProcuringEntityContract in storage",
     *      tags={"ProcuringEntityContracts"},
     *     security={{"Bearer":{}}},
     *      description="Store ProcuringEntityContract",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProcuringEntityContract that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProcuringEntityContractPayload")
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
     *                  ref="#/definitions/ProcuringEntityContract"
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
    public function store(CreateProcuringEntityContractAPIRequest $request): JsonResponse
    {
        $input = $request->all();
        $consultants = $request->consultants;
        $procuringEntityContract = $this->procuringEntityContractRepository->create($input);

        if ($consultants) {
            $procuringEntityContract->consultants()->detach($consultants);
            $procuringEntityContract->consultants()->attach($consultants);
        }


        return $this->sendResponse($procuringEntityContract->toArray(), 'Procuring Entity Contract saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/procuring_entities_contracts/{id}",
     *      summary="Display the specified ProcuringEntityContract",
     *      tags={"ProcuringEntityContracts"},
     *     security={{"Bearer":{}}},
     *      description="Get ProcuringEntityContract",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntityContract",
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
     *                  ref="#/definitions/ProcuringEntityContract"
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
        /** @var ProcuringEntityContract $procuringEntityContract */
        $procuringEntityContract = $this->procuringEntityContractRepository->find($id);

        if ($procuringEntityContract === null) {
            return $this->sendError('Procuring Entity Contract not found');
        }

        return $this->sendResponse($procuringEntityContract->toArray(), 'Procuring Entity Contract retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProcuringEntityContractAPIRequest $request
     *
     * @SWG\Put(
     *      path="/procuring_entities_contracts/{id}",
     *      summary="Update the specified ProcuringEntityContract in storage",
     *      tags={"ProcuringEntityContracts"},
     *     security={{"Bearer":{}}},
     *      description="Update ProcuringEntityContract",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntityContract",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProcuringEntityContract that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProcuringEntityContractPayload")
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
     *                  ref="#/definitions/ProcuringEntityContract"
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
    public function update(int $id, UpdateProcuringEntityContractAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ProcuringEntityContract $procuringEntityContract */
        $procuringEntityContract = $this->procuringEntityContractRepository->find($id);

        if ($procuringEntityContract === null) {
            return $this->sendError('Procuring Entity not found');
        }

        $updatedProcuringEntityContract = $this->procuringEntityContractRepository->update($input, $id);

        $consultants = $request->consultants;
        if ($consultants) {
            $procuringEntityContract->consultants()->detach($consultants);
            $procuringEntityContract->consultants()->attach($consultants);
        }


        return $this->sendResponse($updatedProcuringEntityContract, 'ProcuringEntityContract updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/procuring_entities_contracts/{id}",
     *      summary="Remove the specified ProcuringEntityContract from storage",
     *      tags={"ProcuringEntityContracts"},
     *     security={{"Bearer":{}}},
     *      description="Delete ProcuringEntityContract",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProcuringEntityContract",
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
        /** @var ProcuringEntity $procuringEntityContract */
        $procuringEntityContract = $this->procuringEntityContractRepository->find($id);

        if ($procuringEntityContract === null) {
            return $this->sendError('Procuring Entity Contract not found');
        }

        $procuringEntityContract->delete();

        return $this->sendSuccess('Procuring Entity Contract deleted successfully');
    }
}
