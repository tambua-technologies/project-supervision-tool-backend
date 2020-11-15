<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePositionAPIRequest;
use App\Http\Requests\API\UpdatePositionAPIRequest;
use App\Models\Position;
use App\Repositories\PositionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PositionController
 * @package App\Http\Controllers\API
 */

class PositionAPIController extends AppBaseController
{
    /** @var  PositionRepository */
    private $positionRepository;

    public function __construct(PositionRepository $positionRepo)
    {
        $this->positionRepository = $positionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/positions",
     *      summary="Get a listing of the Positions.",
     *      tags={"Position"},
     *     security={{"Bearer":{}}},
     *      description="Get all Positions",
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
     *                  @SWG\Items(ref="#/definitions/Position")
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
        $positions = $this->positionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($positions->toArray(), 'Positions retrieved successfully');
    }

    /**
     * @param CreatePositionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/positions",
     *      summary="Store a newly created Position in storage",
     *      tags={"Position"},
     *     security={{"Bearer":{}}},
     *      description="Store Position",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Position that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Position")
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
     *                  ref="#/definitions/Position"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePositionAPIRequest $request)
    {
        $input = $request->all();

        $position = $this->positionRepository->create($input);

        return $this->sendResponse($position->toArray(), 'Position saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/positions/{id}",
     *      summary="Display the specified Position",
     *      tags={"Position"},
     *     security={{"Bearer":{}}},
     *      description="Get Position",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Position",
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
     *                  ref="#/definitions/Position"
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
        /** @var Position $position */
        $position = $this->positionRepository->find($id);

        if (empty($position)) {
            return $this->sendError('Position not found');
        }

        return $this->sendResponse($position->toArray(), 'Position retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePositionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/positions/{id}",
     *      summary="Update the specified Position in storage",
     *      tags={"Position"},
     *     security={{"Bearer":{}}},
     *      description="Update Position",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Position",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Position that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Position")
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
     *                  ref="#/definitions/Position"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePositionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Position $position */
        $position = $this->positionRepository->find($id);

        if (empty($position)) {
            return $this->sendError('Position not found');
        }

        $position = $this->positionRepository->update($input, $id);

        return $this->sendResponse($position->toArray(), 'Position updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/positions/{id}",
     *      summary="Remove the specified Position from storage",
     *      tags={"Position"},
     *     security={{"Bearer":{}}},
     *      description="Delete Position",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Position",
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
        /** @var Position $position */
        $position = $this->positionRepository->find($id);

        if (empty($position)) {
            return $this->sendError('Position not found');
        }

        $position->delete();

        return $this->sendSuccess('Position deleted successfully');
    }
}
