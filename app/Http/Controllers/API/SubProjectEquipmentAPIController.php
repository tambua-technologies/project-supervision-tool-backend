<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubProjectEquipmentAPIRequest;
use App\Http\Requests\API\UpdateSubProjectEquipmentAPIRequest;
use App\Models\SubProjectEquipment;
use App\Repositories\SubProjectEquipmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubProjectEquipmentController
 * @package App\Http\Controllers\API
 */

class SubProjectEquipmentAPIController extends AppBaseController
{
    /** @var  SubProjectEquipmentRepository */
    private $subProjectEquipmentRepository;

    public function __construct(SubProjectEquipmentRepository $subProjectEquipmentRepo)
    {
        $this->subProjectEquipmentRepository = $subProjectEquipmentRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sub_project_equipments",
     *      summary="Get a listing of the SubProjectEquipments.",
     *      tags={"SubProjectEquipment"},
     *      description="Get all SubProjectEquipments",
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
     *                  @SWG\Items(ref="#/definitions/SubProjectEquipment")
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
        $subProjectEquipments = $this->subProjectEquipmentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subProjectEquipments->toArray(), 'Sub Project Equipments retrieved successfully');
    }

    /**
     * @param CreateSubProjectEquipmentAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sub_project_equipments",
     *      summary="Store a newly created SubProjectEquipment in storage",
     *      tags={"SubProjectEquipment"},
     *      description="Store SubProjectEquipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectEquipment that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectEquipment")
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
     *                  ref="#/definitions/SubProjectEquipment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSubProjectEquipmentAPIRequest $request)
    {
        $input = $request->all();

        $subProjectEquipment = $this->subProjectEquipmentRepository->create($input);

        return $this->sendResponse($subProjectEquipment->toArray(), 'Sub Project Equipment saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sub_project_equipments/{id}",
     *      summary="Display the specified SubProjectEquipment",
     *      tags={"SubProjectEquipment"},
     *      description="Get SubProjectEquipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectEquipment",
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
     *                  ref="#/definitions/SubProjectEquipment"
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
        /** @var SubProjectEquipment $subProjectEquipment */
        $subProjectEquipment = $this->subProjectEquipmentRepository->find($id);

        if (empty($subProjectEquipment)) {
            return $this->sendError('Sub Project Equipment not found');
        }

        return $this->sendResponse($subProjectEquipment->toArray(), 'Sub Project Equipment retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSubProjectEquipmentAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sub_project_equipments/{id}",
     *      summary="Update the specified SubProjectEquipment in storage",
     *      tags={"SubProjectEquipment"},
     *      description="Update SubProjectEquipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectEquipment",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectEquipment that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectEquipment")
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
     *                  ref="#/definitions/SubProjectEquipment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSubProjectEquipmentAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubProjectEquipment $subProjectEquipment */
        $subProjectEquipment = $this->subProjectEquipmentRepository->find($id);

        if (empty($subProjectEquipment)) {
            return $this->sendError('Sub Project Equipment not found');
        }

        $subProjectEquipment = $this->subProjectEquipmentRepository->update($input, $id);

        return $this->sendResponse($subProjectEquipment->toArray(), 'SubProjectEquipment updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sub_project_equipments/{id}",
     *      summary="Remove the specified SubProjectEquipment from storage",
     *      tags={"SubProjectEquipment"},
     *      description="Delete SubProjectEquipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectEquipment",
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
        /** @var SubProjectEquipment $subProjectEquipment */
        $subProjectEquipment = $this->subProjectEquipmentRepository->find($id);

        if (empty($subProjectEquipment)) {
            return $this->sendError('Sub Project Equipment not found');
        }

        $subProjectEquipment->delete();

        return $this->sendSuccess('Sub Project Equipment deleted successfully');
    }
}
