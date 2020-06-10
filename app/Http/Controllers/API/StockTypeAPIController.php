<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStockTypeAPIRequest;
use App\Http\Requests\API\UpdateStockTypeAPIRequest;
use App\Models\StockType;
use App\Repositories\StockTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StockTypeController
 * @package App\Http\Controllers\API
 */

class StockTypeAPIController extends AppBaseController
{
    /** @var  StockTypeRepository */
    private $stockTypeRepository;

    public function __construct(StockTypeRepository $stockTypeRepo)
    {
        $this->stockTypeRepository = $stockTypeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/stock_types",
     *      summary="Get a listing of the StockTypes.",
     *      tags={"StockType"},
     *      description="Get all StockTypes",
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
     *                  @SWG\Items(ref="#/definitions/StockType")
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
        $stockTypes = $this->stockTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($stockTypes->toArray(), 'Stock Types retrieved successfully');
    }

    /**
     * @param CreateStockTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/stock_types",
     *      summary="Store a newly created StockType in storage",
     *      tags={"StockType"},
     *      description="Store StockType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockType")
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
     *                  ref="#/definitions/StockType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStockTypeAPIRequest $request)
    {
        $input = $request->all();

        $stockType = $this->stockTypeRepository->create($input);

        return $this->sendResponse($stockType->toArray(), 'Stock Type saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/stock_types/{id}",
     *      summary="Display the specified StockType",
     *      tags={"StockType"},
     *      description="Get StockType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockType",
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
     *                  ref="#/definitions/StockType"
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
        /** @var StockType $stockType */
        $stockType = $this->stockTypeRepository->find($id);

        if (empty($stockType)) {
            return $this->sendError('Stock Type not found');
        }

        return $this->sendResponse($stockType->toArray(), 'Stock Type retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStockTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/stock_types/{id}",
     *      summary="Update the specified StockType in storage",
     *      tags={"StockType"},
     *      description="Update StockType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockType")
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
     *                  ref="#/definitions/StockType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStockTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockType $stockType */
        $stockType = $this->stockTypeRepository->find($id);

        if (empty($stockType)) {
            return $this->sendError('Stock Type not found');
        }

        $stockType = $this->stockTypeRepository->update($input, $id);

        return $this->sendResponse($stockType->toArray(), 'StockType updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/stock_types/{id}",
     *      summary="Remove the specified StockType from storage",
     *      tags={"StockType"},
     *      description="Delete StockType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockType",
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
        /** @var StockType $stockType */
        $stockType = $this->stockTypeRepository->find($id);

        if (empty($stockType)) {
            return $this->sendError('Stock Type not found');
        }

        $stockType->delete();

        return $this->sendSuccess('Stock Type deleted successfully');
    }
}
