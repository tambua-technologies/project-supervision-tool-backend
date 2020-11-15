<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateItemAPIRequest;
use App\Http\Requests\API\UpdateItemAPIRequest;
use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ItemController
 * @package App\Http\Controllers\API
 */

class ItemAPIController extends AppBaseController
{
    /** @var  ItemRepository */
    private $itemRepository;

    public function __construct(ItemRepository $itemRepo)
    {
        $this->itemRepository = $itemRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/items",
     *      summary="Get a listing of the Items.",
     *      tags={"Item"},
     *     security={{"Bearer":{}}},
     *      description="Get all Items",
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
     *                  @SWG\Items(ref="#/definitions/Item")
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
        $items = $this->itemRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($items->toArray(), 'Items retrieved successfully');
    }

    /**
     * @param CreateItemAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/items",
     *      summary="Store a newly created Item in storage",
     *      tags={"Item"},
     *     security={{"Bearer":{}}},
     *      description="Store Item",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Item that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Item")
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
     *                  ref="#/definitions/Item"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateItemAPIRequest $request)
    {
        $input = $request->all();

        $item = $this->itemRepository->create($input);

        return $this->sendResponse($item->toArray(), 'Item saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/items/{id}",
     *      summary="Display the specified Item",
     *      tags={"Item"},
     *     security={{"Bearer":{}}},
     *      description="Get Item",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Item",
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
     *                  ref="#/definitions/Item"
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
        /** @var Item $item */
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            return $this->sendError('Item not found');
        }

        return $this->sendResponse($item->toArray(), 'Item retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateItemAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/items/{id}",
     *      summary="Update the specified Item in storage",
     *      tags={"Item"},
     *     security={{"Bearer":{}}},
     *      description="Update Item",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Item",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Item that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Item")
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
     *                  ref="#/definitions/Item"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var Item $item */
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            return $this->sendError('Item not found');
        }

        $item = $this->itemRepository->update($input, $id);

        return $this->sendResponse($item->toArray(), 'Item updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/items/{id}",
     *      summary="Remove the specified Item from storage",
     *      tags={"Item"},
     *     security={{"Bearer":{}}},
     *      description="Delete Item",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Item",
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
        /** @var Item $item */
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            return $this->sendError('Item not found');
        }

        $item->delete();

        return $this->sendSuccess('Item deleted successfully');
    }
}
