<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStockStatusesAPIRequest;
use App\Http\Requests\API\UpdateStockStatusesAPIRequest;
use App\Models\StockStatuses;
use App\Repositories\StockStatusesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StockStatusesController
 * @package App\Http\Controllers\API
 */

class StockStatusesAPIController extends AppBaseController
{
    /** @var  StockStatusesRepository */
    private $stockStatusesRepository;

    public function __construct(StockStatusesRepository $stockStatusesRepo)
    {
        $this->stockStatusesRepository = $stockStatusesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/stock_statuses",
     *      summary="Get a listing of the StockStatuses.",
     *      tags={"StockStatuses"},
     *      description="Get all StockStatuses",
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
     *                  @SWG\Items(ref="#/definitions/StockStatuses")
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
        $stockStatuses = $this->stockStatusesRepository->paginate($request->get('per_page', 15));

        return $this->sendResponse($stockStatuses->toArray(), 'Stock Statuses retrieved successfully');
    }

    /**
     * @param CreateStockStatusesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/stock_statuses",
     *      summary="Store a newly created StockStatuses in storage",
     *      tags={"StockStatuses"},
     *      description="Store StockStatuses",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockStatuses that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockStatuses")
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
     *                  ref="#/definitions/StockStatuses"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStockStatusesAPIRequest $request)
    {
        $input = $request->all();

        $stockStatuses = $this->stockStatusesRepository->create($input);

        return $this->sendResponse($stockStatuses->toArray(), 'Stock Statuses saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/stock_statuses/{id}",
     *      summary="Display the specified StockStatuses",
     *      tags={"StockStatuses"},
     *      description="Get StockStatuses",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockStatuses",
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
     *                  ref="#/definitions/StockStatuses"
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
        /** @var StockStatuses $stockStatuses */
        $stockStatuses = $this->stockStatusesRepository->find($id);

        if (empty($stockStatuses)) {
            return $this->sendError('Stock Statuses not found');
        }

        return $this->sendResponse($stockStatuses->toArray(), 'Stock Statuses retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStockStatusesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/stock_statuses/{id}",
     *      summary="Update the specified StockStatuses in storage",
     *      tags={"StockStatuses"},
     *      description="Update StockStatuses",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockStatuses",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockStatuses that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockStatuses")
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
     *                  ref="#/definitions/StockStatuses"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStockStatusesAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockStatuses $stockStatuses */
        $stockStatuses = $this->stockStatusesRepository->find($id);

        if (empty($stockStatuses)) {
            return $this->sendError('Stock Statuses not found');
        }

        $stockStatuses = $this->stockStatusesRepository->update($input, $id);

        return $this->sendResponse($stockStatuses->toArray(), 'StockStatuses updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/stock_statuses/{id}",
     *      summary="Remove the specified StockStatuses from storage",
     *      tags={"StockStatuses"},
     *      description="Delete StockStatuses",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockStatuses",
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
        /** @var StockStatuses $stockStatuses */
        $stockStatuses = $this->stockStatusesRepository->find($id);

        if (empty($stockStatuses)) {
            return $this->sendError('Stock Statuses not found');
        }

        $stockStatuses->delete();

        return $this->sendSuccess('Stock Statuses deleted successfully');
    }
}
