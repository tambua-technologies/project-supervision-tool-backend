<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateItemAPIRequest;
use App\Http\Requests\API\UpdateItemAPIRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Response;

/**
 * Class ItemController
 * @package App\Http\Controllers\API
 */

class HRTypeAPIController extends AppBaseController
{
    /** @var  ItemRepository */
    private $hr_typeRepository;

    public function __construct(ItemRepository $hr_typeRepo)
    {
        $this->hr_typeRepository = $hr_typeRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/hr_types",
     *      summary="Get a listing of the Items.",
     *      tags={"Item"},
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
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $hr_types = $this->hr_typeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return ItemResource::collection($hr_types);
    }

    /**
     * @param CreateItemAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/hr_types",
     *      summary="Store a newly created Item in storage",
     *      tags={"Item"},
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

        $hr_type = $this->hr_typeRepository->create($input);

        return $this->sendResponse($hr_type->toArray(), 'Item saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/hr_types/{id}",
     *      summary="Display the specified Item",
     *      tags={"Item"},
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
        /** @var Item $hr_type */
        $hr_type = $this->hr_typeRepository->find($id);

        if (empty($hr_type)) {
            return $this->sendError('Item not found');
        }

        return $this->sendResponse($hr_type->toArray(), 'Item retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateItemAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/hr_types/{id}",
     *      summary="Update the specified Item in storage",
     *      tags={"Item"},
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

        /** @var Item $hr_type */
        $hr_type = $this->hr_typeRepository->find($id);

        if (empty($hr_type)) {
            return $this->sendError('Item not found');
        }

        $hr_type = $this->hr_typeRepository->update($input, $id);

        return $this->sendResponse($hr_type->toArray(), 'Item updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/hr_types/{id}",
     *      summary="Remove the specified Item from storage",
     *      tags={"Item"},
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
        /** @var Item $hr_type */
        $hr_type = $this->hr_typeRepository->find($id);

        if (empty($hr_type)) {
            return $this->sendError('Item not found');
        }

        $hr_type->delete();

        return $this->sendSuccess('Item deleted successfully');
    }
}
