<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStockGroupClusterAPIRequest;
use App\Http\Requests\API\UpdateStockGroupClusterAPIRequest;
use App\Models\StockGroupCluster;
use App\Repositories\StockGroupClusterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StockGroupClusterController
 * @package App\Http\Controllers\API
 */

class StockGroupClusterAPIController extends AppBaseController
{
    /** @var  StockGroupClusterRepository */
    private $stockGroupClusterRepository;

    public function __construct(StockGroupClusterRepository $stockGroupClusterRepo)
    {
        $this->stockGroupClusterRepository = $stockGroupClusterRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/stock_group_clusters",
     *      summary="Get a listing of the StockGroupClusters.",
     *      tags={"StockGroupCluster"},
     *      description="Get all StockGroupClusters",
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
     *                  @SWG\Items(ref="#/definitions/StockGroupCluster")
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
        $stockGroupClusters = $this->stockGroupClusterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($stockGroupClusters->toArray(), 'Stock Group Clusters retrieved successfully');
    }

    /**
     * @param CreateStockGroupClusterAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/stock_group_clusters",
     *      summary="Store a newly created StockGroupCluster in storage",
     *      tags={"StockGroupCluster"},
     *      description="Store StockGroupCluster",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockGroupCluster that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockGroupCluster")
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
     *                  ref="#/definitions/StockGroupCluster"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStockGroupClusterAPIRequest $request)
    {
        $input = $request->all();

        $stockGroupCluster = $this->stockGroupClusterRepository->create($input);

        return $this->sendResponse($stockGroupCluster->toArray(), 'Stock Group Cluster saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/stock_group_clusters/{id}",
     *      summary="Display the specified StockGroupCluster",
     *      tags={"StockGroupCluster"},
     *      description="Get StockGroupCluster",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockGroupCluster",
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
     *                  ref="#/definitions/StockGroupCluster"
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
        /** @var StockGroupCluster $stockGroupCluster */
        $stockGroupCluster = $this->stockGroupClusterRepository->find($id);

        if (empty($stockGroupCluster)) {
            return $this->sendError('Stock Group Cluster not found');
        }

        return $this->sendResponse($stockGroupCluster->toArray(), 'Stock Group Cluster retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStockGroupClusterAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/stock_group_clusters/{id}",
     *      summary="Update the specified StockGroupCluster in storage",
     *      tags={"StockGroupCluster"},
     *      description="Update StockGroupCluster",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockGroupCluster",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockGroupCluster that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockGroupCluster")
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
     *                  ref="#/definitions/StockGroupCluster"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStockGroupClusterAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockGroupCluster $stockGroupCluster */
        $stockGroupCluster = $this->stockGroupClusterRepository->find($id);

        if (empty($stockGroupCluster)) {
            return $this->sendError('Stock Group Cluster not found');
        }

        $stockGroupCluster = $this->stockGroupClusterRepository->update($input, $id);

        return $this->sendResponse($stockGroupCluster->toArray(), 'StockGroupCluster updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/stock_group_clusters/{id}",
     *      summary="Remove the specified StockGroupCluster from storage",
     *      tags={"StockGroupCluster"},
     *      description="Delete StockGroupCluster",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockGroupCluster",
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
        /** @var StockGroupCluster $stockGroupCluster */
        $stockGroupCluster = $this->stockGroupClusterRepository->find($id);

        if (empty($stockGroupCluster)) {
            return $this->sendError('Stock Group Cluster not found');
        }

        $stockGroupCluster->delete();

        return $this->sendSuccess('Stock Group Cluster deleted successfully');
    }
}
