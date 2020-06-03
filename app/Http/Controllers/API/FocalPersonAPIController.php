<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFocalPersonAPIRequest;
use App\Http\Requests\API\UpdateFocalPersonAPIRequest;
use App\Models\FocalPerson;
use App\Repositories\FocalPersonRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FocalPersonController
 * @package App\Http\Controllers\API
 */

class FocalPersonAPIController extends AppBaseController
{
    /** @var  FocalPersonRepository */
    private $focalPersonRepository;

    public function __construct(FocalPersonRepository $focalPersonRepo)
    {
        $this->focalPersonRepository = $focalPersonRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/focalPeople",
     *      summary="Get a listing of the FocalPeople.",
     *      tags={"FocalPerson"},
     *      description="Get all FocalPeople",
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
     *                  @SWG\Items(ref="#/definitions/FocalPerson")
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
        $focalPeople = $this->focalPersonRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($focalPeople->toArray(), 'Focal People retrieved successfully');
    }

    /**
     * @param CreateFocalPersonAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/focalPeople",
     *      summary="Store a newly created FocalPerson in storage",
     *      tags={"FocalPerson"},
     *      description="Store FocalPerson",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FocalPerson that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FocalPerson")
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
     *                  ref="#/definitions/FocalPerson"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFocalPersonAPIRequest $request)
    {
        $input = $request->all();

        $focalPerson = $this->focalPersonRepository->create($input);

        return $this->sendResponse($focalPerson->toArray(), 'Focal Person saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/focalPeople/{id}",
     *      summary="Display the specified FocalPerson",
     *      tags={"FocalPerson"},
     *      description="Get FocalPerson",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FocalPerson",
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
     *                  ref="#/definitions/FocalPerson"
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
        /** @var FocalPerson $focalPerson */
        $focalPerson = $this->focalPersonRepository->find($id);

        if (empty($focalPerson)) {
            return $this->sendError('Focal Person not found');
        }

        return $this->sendResponse($focalPerson->toArray(), 'Focal Person retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFocalPersonAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/focalPeople/{id}",
     *      summary="Update the specified FocalPerson in storage",
     *      tags={"FocalPerson"},
     *      description="Update FocalPerson",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FocalPerson",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FocalPerson that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FocalPerson")
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
     *                  ref="#/definitions/FocalPerson"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFocalPersonAPIRequest $request)
    {
        $input = $request->all();

        /** @var FocalPerson $focalPerson */
        $focalPerson = $this->focalPersonRepository->find($id);

        if (empty($focalPerson)) {
            return $this->sendError('Focal Person not found');
        }

        $focalPerson = $this->focalPersonRepository->update($input, $id);

        return $this->sendResponse($focalPerson->toArray(), 'FocalPerson updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/focalPeople/{id}",
     *      summary="Remove the specified FocalPerson from storage",
     *      tags={"FocalPerson"},
     *      description="Delete FocalPerson",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FocalPerson",
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
        /** @var FocalPerson $focalPerson */
        $focalPerson = $this->focalPersonRepository->find($id);

        if (empty($focalPerson)) {
            return $this->sendError('Focal Person not found');
        }

        $focalPerson->delete();

        return $this->sendSuccess('Focal Person deleted successfully');
    }
}
