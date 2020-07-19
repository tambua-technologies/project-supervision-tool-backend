<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHrTypeAPIRequest;
use App\Http\Requests\API\UpdateHrTypeAPIRequest;
use App\Http\Resources\ItemResource;
use App\Models\HrType;
use App\Repositories\HrTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Response;

/**
 * Class HrTypeController
 * @package App\Http\Controllers\API
 */

class HRTypeAPIController extends AppBaseController
{
    /** @var  HrTypeRepository */
    private $hr_typeRepository;

    public function __construct(HrTypeRepository $hr_typeRepo)
    {
        $this->hr_typeRepository = $hr_typeRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/hr_types",
     *      summary="Get a listing of the HrTypes.",
     *      tags={"HrType"},
     *      description="Get all HrTypes",
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
     *                  @SWG\Items(ref="#/definitions/HrType")
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
        $hr_types = $this->hr_typeRepository->paginate($request->get('per_page', 15));
        return ItemResource::collection($hr_types);
    }

    /**
     * @param CreateHrTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/hr_types",
     *      summary="Store a newly created HrType in storage",
     *      tags={"HrType"},
     *      description="Store HrType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="HrType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/HrType")
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
     *                  ref="#/definitions/HrType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateHrTypeAPIRequest $request)
    {
        $input = $request->all();

        $hr_type = $this->hr_typeRepository->create($input);

        return $this->sendResponse($hr_type->toArray(), 'HrType saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/hr_types/{id}",
     *      summary="Display the specified HrType",
     *      tags={"HrType"},
     *      description="Get HrType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of HrType",
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
     *                  ref="#/definitions/HrType"
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
        /** @var HrType $hr_type */
        $hr_type = $this->hr_typeRepository->find($id);

        if (empty($hr_type)) {
            return $this->sendError('HrType not found');
        }

        return $this->sendResponse($hr_type->toArray(), 'HrType retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateHrTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/hr_types/{id}",
     *      summary="Update the specified HrType in storage",
     *      tags={"HrType"},
     *      description="Update HrType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of HrType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="HrType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/HrType")
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
     *                  ref="#/definitions/HrType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateHrTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var HrType $hr_type */
        $hr_type = $this->hr_typeRepository->find($id);

        if (empty($hr_type)) {
            return $this->sendError('HrType not found');
        }

        $hr_type = $this->hr_typeRepository->update($input, $id);

        return $this->sendResponse($hr_type->toArray(), 'HrType updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/hr_types/{id}",
     *      summary="Remove the specified HrType from storage",
     *      tags={"HrType"},
     *      description="Delete HrType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of HrType",
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
        /** @var HrType $hr_type */
        $hr_type = $this->hr_typeRepository->find($id);

        if (empty($hr_type)) {
            return $this->sendError('HrType not found');
        }

        $hr_type->delete();

        return $this->sendSuccess('HrType deleted successfully');
    }
}
