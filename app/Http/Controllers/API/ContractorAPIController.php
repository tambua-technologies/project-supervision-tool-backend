<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContractorAPIRequest;
use App\Http\Requests\API\UpdateContractorAPIRequest;
use App\Models\Contractor;
use App\Models\ProcuringEntity;
use App\Repositories\ContractorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ContractorController
 * @package App\Http\Controllers\API
 */

class ContractorAPIController extends AppBaseController
{
    /** @var  ContractorRepository */
    private $contractorRepository;

    public function __construct(ContractorRepository $contractorRepo)
    {
        $this->contractorRepository = $contractorRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contractors",
     *      summary="Get a listing of the Contractors.",
     *      tags={"Contractor"},
     *     security={{"Bearer":{}}},
     *      description="Get all Contractors",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="filter[contracts.procuringEntityPackage.procuringEntity.projectSubComponent.projectComponent.project_id]",
     *          description="filter contractors by project id",
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
     *                  @SWG\Items(ref="#/definitions/Contractor")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $contractors = QueryBuilder::for(Contractor::class)
            ->allowedFilters([
                AllowedFilter::exact('contracts.procuringEntityPackage.procuringEntity.projectSubComponent.projectComponent.project_id')
            ])
            ->get();

        return $this->sendResponse($contractors->toArray(), 'Contractors retrieved successfully');
    }

    /**
     * @param CreateContractorAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contractors",
     *      summary="Store a newly created Contractor in storage",
     *      tags={"Contractor"},
     *     security={{"Bearer":{}}},
     *      description="Store Contractor",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Contractor that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Contractor")
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
     *                  ref="#/definitions/Contractor"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContractorAPIRequest $request)
    {
        $input = $request->all();

        $contractor = $this->contractorRepository->create($input);

        return $this->sendResponse($contractor->toArray(), 'Contractor saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contractors/{id}",
     *      summary="Display the specified Contractor",
     *      tags={"Contractor"},
     *     security={{"Bearer":{}}},
     *      description="Get Contractor",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Contractor",
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
     *                  ref="#/definitions/Contractor"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Contractor $contractor */
        $contractor = $this->contractorRepository->find($id);

        if ($contractor === null) {
            return $this->sendError('Contractor not found');
        }

        return $this->sendResponse($contractor->toArray(), 'Contractor retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContractorAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contractors/{id}",
     *      summary="Update the specified Contractor in storage",
     *      tags={"Contractor"},
     *     security={{"Bearer":{}}},
     *      description="Update Contractor",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Contractor",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Contractor that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Contractor")
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
     *                  ref="#/definitions/Contractor"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContractorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Contractor $contractor */
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            return $this->sendError('Contractor not found');
        }

        $contractor = $this->contractorRepository->update($input, $id);

        return $this->sendResponse($contractor->toArray(), 'Contractor updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contractors/{id}",
     *      summary="Remove the specified Contractor from storage",
     *      tags={"Contractor"},
     *     security={{"Bearer":{}}},
     *      description="Delete Contractor",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Contractor",
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
     */
    public function destroy($id)
    {
        /** @var Contractor $contractor */
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            return $this->sendError('Contractor not found');
        }

        $contractor->delete();

        return $this->sendSuccess('Contractor deleted successfully');
    }
}
