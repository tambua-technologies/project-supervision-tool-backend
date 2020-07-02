<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHumanResourceAPIRequest;
use App\Http\Requests\API\UpdateHumanResourceAPIRequest;
use App\Http\Resources\HrResource;
use App\Models\HumanResource;
use App\Repositories\HumanResourceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

/**
 * Class HumanResourceController
 * @package App\Http\Controllers\API
 */

class HumanResourceAPIController extends AppBaseController
{
    /** @var  HumanResourceRepository */
    private $humanResourceRepository;

    public function __construct(HumanResourceRepository $humanResourceRepo)
    {
        $this->humanResourceRepository = $humanResourceRepo;
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     *
     * @SWG\Get(
     *      path="/human_resources",
     *      summary="Get a listing of the HumanResources.",
     *      tags={"HumanResource"},
     *      description="Get all HumanResources",
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
     *                  @SWG\Items(ref="#/definitions/HumanResource")
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
        $humanResources = $this->humanResourceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return HrResource::collection($humanResources);
    }

    /**
     * @param CreateHumanResourceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/human_resources",
     *      summary="Store a newly created HumanResource in storage",
     *      tags={"HumanResource"},
     *      description="Store HumanResource",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="HumanResource that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/HumanResource")
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
     *                  ref="#/definitions/HumanResource"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateHumanResourceAPIRequest $request)
    {
        $input = $request->all();

        $humanResource = $this->humanResourceRepository->create($input);

        return $this->sendResponse($humanResource->toArray(), 'Human Resource saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/human_resources/{id}",
     *      summary="Display the specified HumanResource",
     *      tags={"HumanResource"},
     *      description="Get HumanResource",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of HumanResource",
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
     *                  ref="#/definitions/HumanResource"
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
        /** @var HumanResource $humanResource */
        $humanResource = $this->humanResourceRepository->find($id);

        if (empty($humanResource)) {
            return $this->sendError('Human Resource not found');
        }

        return $this->sendResponse($humanResource->toArray(), 'Human Resource retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateHumanResourceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/human_resources/{id}",
     *      summary="Update the specified HumanResource in storage",
     *      tags={"HumanResource"},
     *      description="Update HumanResource",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of HumanResource",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="HumanResource that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/HumanResource")
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
     *                  ref="#/definitions/HumanResource"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateHumanResourceAPIRequest $request)
    {
        $input = $request->all();

        /** @var HumanResource $humanResource */
        $humanResource = $this->humanResourceRepository->find($id);

        if (empty($humanResource)) {
            return $this->sendError('Human Resource not found');
        }

        $humanResource = $this->humanResourceRepository->update($input, $id);

        return $this->sendResponse($humanResource->toArray(), 'HumanResource updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/human_resources/{id}",
     *      summary="Remove the specified HumanResource from storage",
     *      tags={"HumanResource"},
     *      description="Delete HumanResource",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of HumanResource",
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
        /** @var HumanResource $humanResource */
        $humanResource = $this->humanResourceRepository->find($id);

        if (empty($humanResource)) {
            return $this->sendError('Human Resource not found');
        }

        $humanResource->delete();

        return $this->sendSuccess('Human Resource deleted successfully');
    }
}
