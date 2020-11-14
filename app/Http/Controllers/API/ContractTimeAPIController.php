<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContractTimeAPIRequest;
use App\Http\Requests\API\UpdateContractTimeAPIRequest;
use App\Models\ContractTime;
use App\Repositories\ContractTimeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContractTimeController
 * @package App\Http\Controllers\API
 */

class ContractTimeAPIController extends AppBaseController
{
    /** @var  ContractTimeRepository */
    private $contractTimeRepository;

    public function __construct(ContractTimeRepository $contractTimeRepo)
    {
        $this->contractTimeRepository = $contractTimeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contractTimes",
     *      summary="Get a listing of the ContractTimes.",
     *      tags={"ContractTime"},
     *      description="Get all ContractTimes",
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
     *                  @SWG\Items(ref="#/definitions/ContractTime")
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
        $contractTimes = $this->contractTimeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($contractTimes->toArray(), 'Contract Times retrieved successfully');
    }

    /**
     * @param CreateContractTimeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contractTimes",
     *      summary="Store a newly created ContractTime in storage",
     *      tags={"ContractTime"},
     *      description="Store ContractTime",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContractTime that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContractTime")
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
     *                  ref="#/definitions/ContractTime"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContractTimeAPIRequest $request)
    {
        $input = $request->all();

        $contractTime = $this->contractTimeRepository->create($input);

        return $this->sendResponse($contractTime->toArray(), 'Contract Time saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contractTimes/{id}",
     *      summary="Display the specified ContractTime",
     *      tags={"ContractTime"},
     *      description="Get ContractTime",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContractTime",
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
     *                  ref="#/definitions/ContractTime"
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
        /** @var ContractTime $contractTime */
        $contractTime = $this->contractTimeRepository->find($id);

        if (empty($contractTime)) {
            return $this->sendError('Contract Time not found');
        }

        return $this->sendResponse($contractTime->toArray(), 'Contract Time retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContractTimeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contractTimes/{id}",
     *      summary="Update the specified ContractTime in storage",
     *      tags={"ContractTime"},
     *      description="Update ContractTime",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContractTime",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContractTime that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContractTime")
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
     *                  ref="#/definitions/ContractTime"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContractTimeAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContractTime $contractTime */
        $contractTime = $this->contractTimeRepository->find($id);

        if (empty($contractTime)) {
            return $this->sendError('Contract Time not found');
        }

        $contractTime = $this->contractTimeRepository->update($input, $id);

        return $this->sendResponse($contractTime->toArray(), 'ContractTime updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contractTimes/{id}",
     *      summary="Remove the specified ContractTime from storage",
     *      tags={"ContractTime"},
     *      description="Delete ContractTime",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContractTime",
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
        /** @var ContractTime $contractTime */
        $contractTime = $this->contractTimeRepository->find($id);

        if (empty($contractTime)) {
            return $this->sendError('Contract Time not found');
        }

        $contractTime->delete();

        return $this->sendSuccess('Contract Time deleted successfully');
    }
}
