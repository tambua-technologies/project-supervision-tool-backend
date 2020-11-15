<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFundingOrganisationAPIRequest;
use App\Http\Requests\API\UpdateFundingOrganisationAPIRequest;
use App\Models\FundingOrganisation;
use App\Repositories\FundingOrganisationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FundingOrganisationController
 * @package App\Http\Controllers\API
 */

class FundingOrganisationAPIController extends AppBaseController
{
    /** @var  FundingOrganisationRepository */
    private $fundingOrganisationRepository;

    public function __construct(FundingOrganisationRepository $fundingOrganisationRepo)
    {
        $this->fundingOrganisationRepository = $fundingOrganisationRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/funding_organisations",
     *      summary="Get a listing of the FundingOrganisations.",
     *      tags={"FundingOrganisation"},
     *     security={{"Bearer":{}}},
     *      description="Get all FundingOrganisations",
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
     *                  @SWG\Items(ref="#/definitions/FundingOrganisation")
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
        $fundingOrganisations = $this->fundingOrganisationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($fundingOrganisations->toArray(), 'Funding Organisations retrieved successfully');
    }

    /**
     * @param CreateFundingOrganisationAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/funding_organisations",
     *      summary="Store a newly created FundingOrganisation in storage",
     *      tags={"FundingOrganisation"},
     *     security={{"Bearer":{}}},
     *      description="Store FundingOrganisation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FundingOrganisation that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FundingOrganisation")
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
     *                  ref="#/definitions/FundingOrganisation"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFundingOrganisationAPIRequest $request)
    {
        $input = $request->all();

        $fundingOrganisation = $this->fundingOrganisationRepository->create($input);

        return $this->sendResponse($fundingOrganisation->toArray(), 'Funding Organisation saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/funding_organisations/{id}",
     *      summary="Display the specified FundingOrganisation",
     *      tags={"FundingOrganisation"},
     *     security={{"Bearer":{}}},
     *      description="Get FundingOrganisation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FundingOrganisation",
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
     *                  ref="#/definitions/FundingOrganisation"
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
        /** @var FundingOrganisation $fundingOrganisation */
        $fundingOrganisation = $this->fundingOrganisationRepository->find($id);

        if (empty($fundingOrganisation)) {
            return $this->sendError('Funding Organisation not found');
        }

        return $this->sendResponse($fundingOrganisation->toArray(), 'Funding Organisation retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFundingOrganisationAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/funding_organisations/{id}",
     *      summary="Update the specified FundingOrganisation in storage",
     *      tags={"FundingOrganisation"},
     *     security={{"Bearer":{}}},
     *      description="Update FundingOrganisation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FundingOrganisation",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FundingOrganisation that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FundingOrganisation")
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
     *                  ref="#/definitions/FundingOrganisation"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFundingOrganisationAPIRequest $request)
    {
        $input = $request->all();

        /** @var FundingOrganisation $fundingOrganisation */
        $fundingOrganisation = $this->fundingOrganisationRepository->find($id);

        if (empty($fundingOrganisation)) {
            return $this->sendError('Funding Organisation not found');
        }

        $fundingOrganisation = $this->fundingOrganisationRepository->update($input, $id);

        return $this->sendResponse($fundingOrganisation->toArray(), 'FundingOrganisation updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/funding_organisations/{id}",
     *      summary="Remove the specified FundingOrganisation from storage",
     *      tags={"FundingOrganisation"},
     *     security={{"Bearer":{}}},
     *      description="Delete FundingOrganisation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FundingOrganisation",
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
        /** @var FundingOrganisation $fundingOrganisation */
        $fundingOrganisation = $this->fundingOrganisationRepository->find($id);

        if (empty($fundingOrganisation)) {
            return $this->sendError('Funding Organisation not found');
        }

        $fundingOrganisation->delete();

        return $this->sendSuccess('Funding Organisation deleted successfully');
    }
}
