<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMoneyAPIRequest;
use App\Http\Requests\API\UpdateMoneyAPIRequest;
use App\Models\Money;
use App\Repositories\MoneyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MoneyController
 * @package App\Http\Controllers\API
 */

class MoneyAPIController extends AppBaseController
{
    /** @var  MoneyRepository */
    private $moneyRepository;

    public function __construct(MoneyRepository $moneyRepo)
    {
        $this->moneyRepository = $moneyRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/money",
     *      summary="Get a listing of the Money.",
     *      tags={"Money"},
     *      description="Get all Money",
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
     *                  @SWG\Items(ref="#/definitions/Money")
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
        $money = $this->moneyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($money->toArray(), 'Money retrieved successfully');
    }

    /**
     * @param CreateMoneyAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/money",
     *      summary="Store a newly created Money in storage",
     *      tags={"Money"},
     *      description="Store Money",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Money that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Money")
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
     *                  ref="#/definitions/Money"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMoneyAPIRequest $request)
    {
        $input = $request->all();

        $money = $this->moneyRepository->create($input);

        return $this->sendResponse($money->toArray(), 'Money saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/money/{id}",
     *      summary="Display the specified Money",
     *      tags={"Money"},
     *      description="Get Money",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Money",
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
     *                  ref="#/definitions/Money"
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
        /** @var Money $money */
        $money = $this->moneyRepository->find($id);

        if (empty($money)) {
            return $this->sendError('Money not found');
        }

        return $this->sendResponse($money->toArray(), 'Money retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMoneyAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/money/{id}",
     *      summary="Update the specified Money in storage",
     *      tags={"Money"},
     *      description="Update Money",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Money",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Money that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Money")
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
     *                  ref="#/definitions/Money"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMoneyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Money $money */
        $money = $this->moneyRepository->find($id);

        if (empty($money)) {
            return $this->sendError('Money not found');
        }

        $money = $this->moneyRepository->update($input, $id);

        return $this->sendResponse($money->toArray(), 'Money updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/money/{id}",
     *      summary="Remove the specified Money from storage",
     *      tags={"Money"},
     *      description="Delete Money",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Money",
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
        /** @var Money $money */
        $money = $this->moneyRepository->find($id);

        if (empty($money)) {
            return $this->sendError('Money not found');
        }

        $money->delete();

        return $this->sendSuccess('Money deleted successfully');
    }
}
