<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContractCostAPIRequest;
use App\Http\Requests\API\UpdateContractCostAPIRequest;
use App\Models\ContractCost;
use App\Repositories\ContractCostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContractCostController
 * @package App\Http\Controllers\API
 */

class ContractCostAPIController extends AppBaseController
{
    /** @var  ContractCostRepository */
    private $contractCostRepository;

    public function __construct(ContractCostRepository $contractCostRepo)
    {
        $this->contractCostRepository = $contractCostRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contractCosts",
     *      summary="Get a listing of the ContractCosts.",
     *      tags={"ContractCost"},
     *     security={{"Bearer":{}}},
     *      description="Get all ContractCosts",
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
     *                  @SWG\Items(ref="#/definitions/ContractCost")
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
        $contractCosts = $this->contractCostRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($contractCosts->toArray(), 'Contract Costs retrieved successfully');
    }

    /**
     * @param CreateContractCostAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contractCosts",
     *      summary="Store a newly created ContractCost in storage",
     *      tags={"ContractCost"},
     *     security={{"Bearer":{}}},
     *      description="Store ContractCost",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContractCost that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContractCost")
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
     *                  ref="#/definitions/ContractCost"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContractCostAPIRequest $request)
    {
        $input = $request->all();

        $contractCost = $this->contractCostRepository->create($input);

        return $this->sendResponse($contractCost->toArray(), 'Contract Cost saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contractCosts/{id}",
     *      summary="Display the specified ContractCost",
     *      tags={"ContractCost"},
     *     security={{"Bearer":{}}},
     *      description="Get ContractCost",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContractCost",
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
     *                  ref="#/definitions/ContractCost"
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
        /** @var ContractCost $contractCost */
        $contractCost = $this->contractCostRepository->find($id);

        if (empty($contractCost)) {
            return $this->sendError('Contract Cost not found');
        }

        return $this->sendResponse($contractCost->toArray(), 'Contract Cost retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContractCostAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contractCosts/{id}",
     *      summary="Update the specified ContractCost in storage",
     *      tags={"ContractCost"},
     *     security={{"Bearer":{}}},
     *      description="Update ContractCost",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContractCost",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContractCost that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContractCost")
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
     *                  ref="#/definitions/ContractCost"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContractCostAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContractCost $contractCost */
        $contractCost = $this->contractCostRepository->find($id);

        if (empty($contractCost)) {
            return $this->sendError('Contract Cost not found');
        }

        $contractCost = $this->contractCostRepository->update($input, $id);

        return $this->sendResponse($contractCost->toArray(), 'ContractCost updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contractCosts/{id}",
     *      summary="Remove the specified ContractCost from storage",
     *      tags={"ContractCost"},
     *     security={{"Bearer":{}}},
     *      description="Delete ContractCost",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContractCost",
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
        /** @var ContractCost $contractCost */
        $contractCost = $this->contractCostRepository->find($id);

        if (empty($contractCost)) {
            return $this->sendError('Contract Cost not found');
        }

        $contractCost->delete();

        return $this->sendSuccess('Contract Cost deleted successfully');
    }
}
