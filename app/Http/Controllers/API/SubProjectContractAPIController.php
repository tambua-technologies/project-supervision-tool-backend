<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubProjectContractAPIRequest;
use App\Http\Requests\API\UpdateSubProjectContractAPIRequest;
use App\Models\SubProjectContract;
use App\Repositories\SubProjectContractRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubProjectContractController
 * @package App\Http\Controllers\API
 */

class SubProjectContractAPIController extends AppBaseController
{
    /** @var  SubProjectContractRepository */
    private $subProjectContractRepository;

    public function __construct(SubProjectContractRepository $subProjectContractRepo)
    {
        $this->subProjectContractRepository = $subProjectContractRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sub_project_contracts",
     *      summary="Get a listing of the SubProjectContracts.",
     *      tags={"SubProjectContract"},
     *     security={{"Bearer":{}}},
     *      description="Get all SubProjectContracts",
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
     *                  @SWG\Items(ref="#/definitions/SubProjectContract")
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
        $subProjectContracts = $this->subProjectContractRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subProjectContracts->toArray(), 'Sub Project Contracts retrieved successfully');
    }

    /**
     * @param CreateSubProjectContractAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sub_project_contracts",
     *      summary="Store a newly created SubProjectContract in storage",
     *      tags={"SubProjectContract"},
     *     security={{"Bearer":{}}},
     *      description="Store SubProjectContract",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectContract that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectContract")
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
     *                  ref="#/definitions/SubProjectContract"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSubProjectContractAPIRequest $request)
    {
        $input = $request->all();

        $subProjectContract = $this->subProjectContractRepository->create($input);

        return $this->sendResponse($subProjectContract->toArray(), 'Sub Project Contract saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sub_project_contracts/{id}",
     *      summary="Display the specified SubProjectContract",
     *      tags={"SubProjectContract"},
     *     security={{"Bearer":{}}},
     *      description="Get SubProjectContract",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectContract",
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
     *                  ref="#/definitions/SubProjectContract"
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
        /** @var SubProjectContract $subProjectContract */
        $subProjectContract = $this->subProjectContractRepository->find($id);

        if (empty($subProjectContract)) {
            return $this->sendError('Sub Project Contract not found');
        }

        return $this->sendResponse($subProjectContract->toArray(), 'Sub Project Contract retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSubProjectContractAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sub_project_contracts/{id}",
     *      summary="Update the specified SubProjectContract in storage",
     *      tags={"SubProjectContract"},
     *     security={{"Bearer":{}}},
     *      description="Update SubProjectContract",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectContract",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectContract that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectContract")
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
     *                  ref="#/definitions/SubProjectContract"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSubProjectContractAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubProjectContract $subProjectContract */
        $subProjectContract = $this->subProjectContractRepository->find($id);

        if (empty($subProjectContract)) {
            return $this->sendError('Sub Project Contract not found');
        }

        $subProjectContract = $this->subProjectContractRepository->update($input, $id);

        return $this->sendResponse($subProjectContract->toArray(), 'SubProjectContract updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sub_project_contracts/{id}",
     *      summary="Remove the specified SubProjectContract from storage",
     *      tags={"SubProjectContract"},
     *     security={{"Bearer":{}}},
     *      description="Delete SubProjectContract",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectContract",
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
        /** @var SubProjectContract $subProjectContract */
        $subProjectContract = $this->subProjectContractRepository->find($id);

        if (empty($subProjectContract)) {
            return $this->sendError('Sub Project Contract not found');
        }

        $subProjectContract->delete();

        return $this->sendSuccess('Sub Project Contract deleted successfully');
    }
}
