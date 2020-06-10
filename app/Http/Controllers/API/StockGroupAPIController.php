<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStockGroupAPIRequest;
use App\Http\Requests\API\UpdateStockGroupAPIRequest;
use App\Models\StockGroup;
use App\Repositories\StockGroupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StockGroupController
 * @package App\Http\Controllers\API
 */

class StockGroupAPIController extends AppBaseController
{
    /** @var  StockGroupRepository */
    private $stockGroupRepository;

    public function __construct(StockGroupRepository $stockGroupRepo)
    {
        $this->stockGroupRepository = $stockGroupRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/stock_groups",
     *      summary="Get a listing of the StockGroups.",
     *      tags={"StockGroup"},
     *      description="Get all StockGroups",
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
     *                  @SWG\Items(ref="#/definitions/StockGroup")
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
        $stockGroups = $this->stockGroupRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($stockGroups->toArray(), 'Stock Groups retrieved successfully');
    }

    /**
     * @param CreateStockGroupAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/stock_groups",
     *      summary="Store a newly created StockGroup in storage",
     *      tags={"StockGroup"},
     *      description="Store StockGroup",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockGroup that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockGroup")
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
     *                  ref="#/definitions/StockGroup"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStockGroupAPIRequest $request)
    {
        $input = $request->all();

        $stockGroup = $this->stockGroupRepository->create($input);

        return $this->sendResponse($stockGroup->toArray(), 'Stock Group saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/stock_groups/{id}",
     *      summary="Display the specified StockGroup",
     *      tags={"StockGroup"},
     *      description="Get StockGroup",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockGroup",
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
     *                  ref="#/definitions/StockGroup"
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
        /** @var StockGroup $stockGroup */
        $stockGroup = $this->stockGroupRepository->find($id);

        if (empty($stockGroup)) {
            return $this->sendError('Stock Group not found');
        }

        return $this->sendResponse($stockGroup->toArray(), 'Stock Group retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStockGroupAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/stock_groups/{id}",
     *      summary="Update the specified StockGroup in storage",
     *      tags={"StockGroup"},
     *      description="Update StockGroup",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockGroup",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockGroup that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockGroup")
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
     *                  ref="#/definitions/StockGroup"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStockGroupAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockGroup $stockGroup */
        $stockGroup = $this->stockGroupRepository->find($id);

        if (empty($stockGroup)) {
            return $this->sendError('Stock Group not found');
        }

        $stockGroup = $this->stockGroupRepository->update($input, $id);

        return $this->sendResponse($stockGroup->toArray(), 'StockGroup updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/stock_groups/{id}",
     *      summary="Remove the specified StockGroup from storage",
     *      tags={"StockGroup"},
     *      description="Delete StockGroup",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockGroup",
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
        /** @var StockGroup $stockGroup */
        $stockGroup = $this->stockGroupRepository->find($id);

        if (empty($stockGroup)) {
            return $this->sendError('Stock Group not found');
        }

        $stockGroup->delete();

        return $this->sendSuccess('Stock Group deleted successfully');
    }
}
