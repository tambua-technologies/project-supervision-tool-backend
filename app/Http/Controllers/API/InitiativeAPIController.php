<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInitiativeAPIRequest;
use App\Http\Requests\API\UpdateInitiativeAPIRequest;
use App\Http\Resources\InitiativeResource;
use App\Models\Initiative;
use App\Models\Location;
use App\Repositories\InitiativeRepository;
use App\Repositories\LocationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class InitiativeController
 * @package App\Http\Controllers\API
 */

class InitiativeAPIController extends AppBaseController
{
    /** @var  InitiativeRepository */
    private $initiativeRepository;

    private $locationRepository;


    public function __construct(InitiativeRepository $initiativeRepo, LocationRepository $locationRepo)
    {
        $this->initiativeRepository = $initiativeRepo;
        $this->locationRepository = $locationRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/initiatives",
     *      summary="Get a listing of the Initiatives.",
     *      tags={"Initiative"},
     *      description="Get all Initiatives",
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
     *                  @SWG\Items(ref="#/definitions/Initiative")
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
        $initiatives = $this->initiativeRepository->paginate($request->get('per_page', 15));

        return InitiativeResource::collection($initiatives);
    }

    /**
     * @param CreateInitiativeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/initiatives",
     *      summary="Store a newly created Initiative in storage",
     *      tags={"Initiative"},
     *      description="Store Initiative",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Initiative that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Initiative")
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
     *                  ref="#/definitions/Initiative"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInitiativeAPIRequest $request)
    {
        $input = $request->all();
        $location = Location::query()->create( $request->only(['region_id', 'district_id', 'level']));

        $initiative = $this->initiativeRepository->create([
            'title' => $request->title,
            'end_date' => $request->end_date,
            'start_date' => $request->start_date,
            'actor_type_id' => $request->actor_type_id,
            'initiative_type_id' => $request->initiative_type_id,
            'focal_person_id' => $request->focal_person_id,
            'location_id' => $location->id,
        ]);

        if($request->implementing_partners)
        {
            $initiative->implementing_partners()->attach($request->implementing_partners);
        }

        if($request->funding_organisations)
        {
            $initiative->funding_organisations()->attach($request->funding_organisations);
        }

        return $this->sendResponse(new InitiativeResource($initiative), 'Initiative Resource saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/initiatives/{id}",
     *      summary="Display the specified Initiative",
     *      tags={"Initiative"},
     *      description="Get Initiative",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Initiative",
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
     *                  ref="#/definitions/Initiative"
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
        /** @var Initiative $initiative */
        $initiative = $this->initiativeRepository->find($id);

        if (empty($initiative)) {
            return $this->sendError('Initiative not found');
        }

        return $this->sendResponse(new InitiativeResource($initiative), 'Initiative retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInitiativeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/initiatives/{id}",
     *      summary="Update the specified Initiative in storage",
     *      tags={"Initiative"},
     *      description="Update Initiative",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Initiative",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Initiative that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Initiative")
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
     *                  ref="#/definitions/Initiative"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInitiativeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Initiative $initiative */
        $initiative = $this->initiativeRepository->find($id);
        $location = $initiative->location;


        if (empty($initiative)) {
            return $this->sendError('Human Resource not found');
        }

        if($request->implementing_partners)
        {
            $implementing_partners_ids = $initiative->implementing_partners()->get()->pluck(['id']);
            $initiative->implementing_partners()->detach($implementing_partners_ids);
            $initiative->implementing_partners()->attach($request->implementing_partners);
        }

        if($request->funding_organisations)
        {
            $funding_organisations_ids = $initiative->funding_organisations()->get()->pluck(['id']);
            $initiative->funding_organisations()->detach($funding_organisations_ids);
            $initiative->funding_organisations()->attach($request->funding_organisations);
        }

        $initiative = $this->initiativeRepository->update($input, $id);
        $this->locationRepository->update($request->only(['region_id', 'district_id', 'level']), $location->id);

        return $this->sendResponse(new InitiativeResource($initiative), 'Initiative updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/initiatives/{id}",
     *      summary="Remove the specified Initiative from storage",
     *      tags={"Initiative"},
     *      description="Delete Initiative",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Initiative",
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
        /** @var Initiative $initiative */
        $initiative = $this->initiativeRepository->find($id);

        if (empty($initiative)) {
            return $this->sendError('Initiative not found');
        }

        $initiative->delete();

        return $this->sendSuccess('Initiative deleted successfully');
    }
}
