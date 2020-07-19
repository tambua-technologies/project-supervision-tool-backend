<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmergencyResponseThemeAPIRequest;
use App\Http\Requests\API\UpdateEmergencyResponseThemeAPIRequest;
use App\Models\EmergencyResponseTheme;
use App\Repositories\EmergencyResponseThemeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EmergencyResponseThemeController
 * @package App\Http\Controllers\API
 */

class EmergencyResponseThemeAPIController extends AppBaseController
{
    /** @var  EmergencyResponseThemeRepository */
    private $emergencyResponseThemeRepository;

    public function __construct(EmergencyResponseThemeRepository $emergencyResponseThemeRepo)
    {
        $this->emergencyResponseThemeRepository = $emergencyResponseThemeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/emergency_response_themes",
     *      summary="Get a listing of the EmergencyResponseThemes.",
     *      tags={"EmergencyResponseTheme"},
     *      description="Get all EmergencyResponseThemes",
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
     *                  @SWG\Items(ref="#/definitions/EmergencyResponseTheme")
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
        $emergencyResponseThemes = $this->emergencyResponseThemeRepository->paginate(
            $request->get('per_page', 15),
            $request->except(['skip', 'limit'])
        );

        return $this->sendResponse($emergencyResponseThemes->toArray(), 'Emergency Response Themes retrieved successfully');
    }

    /**
     * @param CreateEmergencyResponseThemeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/emergency_response_themes",
     *      summary="Store a newly created EmergencyResponseTheme in storage",
     *      tags={"EmergencyResponseTheme"},
     *      description="Store EmergencyResponseTheme",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="EmergencyResponseTheme that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/EmergencyResponseTheme")
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
     *                  ref="#/definitions/EmergencyResponseTheme"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEmergencyResponseThemeAPIRequest $request)
    {
        $input = $request->all();

        $emergencyResponseTheme = $this->emergencyResponseThemeRepository->create($input);

        return $this->sendResponse($emergencyResponseTheme->toArray(), 'Emergency Response Theme saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/emergency_response_themes/{id}",
     *      summary="Display the specified EmergencyResponseTheme",
     *      tags={"EmergencyResponseTheme"},
     *      description="Get EmergencyResponseTheme",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EmergencyResponseTheme",
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
     *                  ref="#/definitions/EmergencyResponseTheme"
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
        /** @var EmergencyResponseTheme $emergencyResponseTheme */
        $emergencyResponseTheme = $this->emergencyResponseThemeRepository->find($id);

        if (empty($emergencyResponseTheme)) {
            return $this->sendError('Emergency Response Theme not found');
        }

        return $this->sendResponse($emergencyResponseTheme->toArray(), 'Emergency Response Theme retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEmergencyResponseThemeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/emergency_response_themes/{id}",
     *      summary="Update the specified EmergencyResponseTheme in storage",
     *      tags={"EmergencyResponseTheme"},
     *      description="Update EmergencyResponseTheme",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EmergencyResponseTheme",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="EmergencyResponseTheme that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/EmergencyResponseTheme")
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
     *                  ref="#/definitions/EmergencyResponseTheme"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEmergencyResponseThemeAPIRequest $request)
    {
        $input = $request->all();

        /** @var EmergencyResponseTheme $emergencyResponseTheme */
        $emergencyResponseTheme = $this->emergencyResponseThemeRepository->find($id);

        if (empty($emergencyResponseTheme)) {
            return $this->sendError('Emergency Response Theme not found');
        }

        $emergencyResponseTheme = $this->emergencyResponseThemeRepository->update($input, $id);

        return $this->sendResponse($emergencyResponseTheme->toArray(), 'EmergencyResponseTheme updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/emergency_response_themes/{id}",
     *      summary="Remove the specified EmergencyResponseTheme from storage",
     *      tags={"EmergencyResponseTheme"},
     *      description="Delete EmergencyResponseTheme",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EmergencyResponseTheme",
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
        /** @var EmergencyResponseTheme $emergencyResponseTheme */
        $emergencyResponseTheme = $this->emergencyResponseThemeRepository->find($id);

        if (empty($emergencyResponseTheme)) {
            return $this->sendError('Emergency Response Theme not found');
        }

        $emergencyResponseTheme->delete();

        return $this->sendSuccess('Emergency Response Theme deleted successfully');
    }
}
