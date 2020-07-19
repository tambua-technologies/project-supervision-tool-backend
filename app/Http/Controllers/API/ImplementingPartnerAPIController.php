<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateImplementingPartnerAPIRequest;
use App\Http\Requests\API\UpdateImplementingPartnerAPIRequest;
use App\Models\ImplementingPartner;
use App\Repositories\ImplementingPartnerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ImplementingPartnerController
 * @package App\Http\Controllers\API
 */

class ImplementingPartnerAPIController extends AppBaseController
{
    /** @var  ImplementingPartnerRepository */
    private $implementingPartnerRepository;

    public function __construct(ImplementingPartnerRepository $implementingPartnerRepo)
    {
        $this->implementingPartnerRepository = $implementingPartnerRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/implementing_partners",
     *      summary="Get a listing of the ImplementingPartners.",
     *      tags={"ImplementingPartner"},
     *      description="Get all ImplementingPartners",
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
     *                  @SWG\Items(ref="#/definitions/ImplementingPartner")
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
        $agencies = $this->implementingPartnerRepository->paginate($request->get('per_page', 15));

        return $this->sendResponse($agencies->toArray(), 'ImplementingPartners retrieved successfully');
    }

    /**
     * @param CreateImplementingPartnerAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/implementing_partners",
     *      summary="Store a newly created ImplementingPartner in storage",
     *      tags={"ImplementingPartner"},
     *      description="Store ImplementingPartner",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ImplementingPartner that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ImplementingPartner")
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
     *                  ref="#/definitions/ImplementingPartner"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateImplementingPartnerAPIRequest $request)
    {
        $input = $request->all();

        $implementingPartner = $this->implementingPartnerRepository->create($input);

        return $this->sendResponse($implementingPartner->toArray(), 'ImplementingPartner saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/implementing_partners/{id}",
     *      summary="Display the specified ImplementingPartner",
     *      tags={"ImplementingPartner"},
     *      description="Get ImplementingPartner",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ImplementingPartner",
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
     *                  ref="#/definitions/ImplementingPartner"
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
        /** @var ImplementingPartner $implementingPartner */
        $implementingPartner = $this->implementingPartnerRepository->find($id);

        if (empty($implementingPartner)) {
            return $this->sendError('ImplementingPartner not found');
        }

        return $this->sendResponse($implementingPartner->toArray(), 'ImplementingPartner retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateImplementingPartnerAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/implementing_partners/{id}",
     *      summary="Update the specified ImplementingPartner in storage",
     *      tags={"ImplementingPartner"},
     *      description="Update ImplementingPartner",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ImplementingPartner",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ImplementingPartner that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ImplementingPartner")
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
     *                  ref="#/definitions/ImplementingPartner"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateImplementingPartnerAPIRequest $request)
    {
        $input = $request->all();

        /** @var ImplementingPartner $implementingPartner */
        $implementingPartner = $this->implementingPartnerRepository->find($id);

        if (empty($implementingPartner)) {
            return $this->sendError('ImplementingPartner not found');
        }

        $implementingPartner = $this->implementingPartnerRepository->update($input, $id);

        return $this->sendResponse($implementingPartner->toArray(), 'ImplementingPartner updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/implementing_partners/{id}",
     *      summary="Remove the specified ImplementingPartner from storage",
     *      tags={"ImplementingPartner"},
     *      description="Delete ImplementingPartner",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ImplementingPartner",
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
        /** @var ImplementingPartner $implementingPartner */
        $implementingPartner = $this->implementingPartnerRepository->find($id);

        if (empty($implementingPartner)) {
            return $this->sendError('ImplementingPartner not found');
        }

        $implementingPartner->delete();

        return $this->sendSuccess('ImplementingPartner deleted successfully');
    }
}
