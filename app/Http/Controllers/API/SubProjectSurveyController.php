<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubProjectSurveyAPIRequest;
use App\Http\Requests\API\UpdateSubProjectSurveyAPIRequest;
use App\Models\SubProjectSurvey;
use App\Repositories\SubProjectSurveyRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class SubProjectSurveyController
 * @package App\Http\Controllers\API
 */

class SubProjectSurveyController extends AppBaseController
{
    /** @var  SubProjectSurveyRepository */
    private $subProjectSurveyRepository;

    public function __construct(SubProjectSurveyRepository $subProjectSurveyRepo)
    {
        $this->subProjectSurveyRepository = $subProjectSurveyRepo;
    }

    /**
     *
     * @SWG\Get(
     *      path="/sub_project_surveys",
     *      summary="Get a listing of the SubProjectSurveys.",
     *      tags={"SubProjectSurvey"},
     *     security={{"Bearer":{}}},
     *      description="Get all SubProjectSurveys",
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
     *                  @SWG\Items(ref="#/definitions/SubProjectSurvey")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      ),
     * )
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $subProjectSurveys = $this->subProjectSurveyRepository->paginate($request->get('per_page', 15));

        return $this->sendResponse($subProjectSurveys, 'SubProjectSurveys retrieved successfully');
    }

    /**
     * @param CreateSubProjectSurveyAPIRequest $request
     *
     * @SWG\Post(
     *      path="/sub_project_surveys",
     *      summary="Store a newly created SubProjectSurvey in storage",
     *      tags={"SubProjectSurvey"},
     *     security={{"Bearer":{}}},
     *      description="Store SubProjectSurvey",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectSurvey that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectSurveyPayload")
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
     *                  ref="#/definitions/SubProjectSurvey"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @return JsonResponse
     */
    public function store(CreateSubProjectSurveyAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $subProjectSurvey = $this->subProjectSurveyRepository->create($input);

        return $this->sendResponse($subProjectSurvey->toArray(), 'SubProjectSurvey saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/sub_project_surveys/{id}",
     *      summary="Display the specified SubProjectSurvey",
     *      tags={"SubProjectSurvey"},
     *     security={{"Bearer":{}}},
     *      description="Get SubProjectSurvey",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectSurvey",
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
     *                  ref="#/definitions/SubProjectSurvey"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        /** @var SubProjectSurvey $subProjectSurvey */
        $subProjectSurvey = $this->subProjectSurveyRepository->find($id);

        if (empty($subProjectSurvey)) {
            return $this->sendError('SubProjectSurvey not found');
        }

        return $this->sendResponse($subProjectSurvey->toArray(), 'SubProjectSurvey retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSubProjectSurveyAPIRequest $request
     *
     * @SWG\Put(
     *      path="/sub_project_surveys/{id}",
     *      summary="Update the specified SubProjectSurvey in storage",
     *      tags={"SubProjectSurvey"},
     *     security={{"Bearer":{}}},
     *      description="Update SubProjectSurvey",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectSurvey",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProjectSurvey that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectSurvey")
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
     *                  ref="#/definitions/SubProjectSurvey"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @return JsonResponse
     */
    public function update(int $id, UpdateSubProjectSurveyAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var SubProjectSurvey $subProjectSurvey */
        $subProjectSurvey = $this->subProjectSurveyRepository->find($id);

        if (empty($subProjectSurvey)) {
            return $this->sendError('SubProjectSurvey not found');
        }

        $subProjectSurvey = $this->subProjectSurveyRepository->update($input, $id);

        return $this->sendResponse($subProjectSurvey->toArray(), 'SubProjectSurvey updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/sub_project_surveys/{id}",
     *      summary="Remove the specified SubProjectSurvey from storage",
     *      tags={"SubProjectSurvey"},
     *     security={{"Bearer":{}}},
     *      description="Delete SubProjectSurvey",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProjectSurvey",
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
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        /** @var SubProjectSurvey $subProjectSurvey */
        $subProjectSurvey = $this->subProjectSurveyRepository->find($id);

        if (empty($subProjectSurvey)) {
            return $this->sendError('SubProjectSurvey not found');
        }

        $subProjectSurvey->delete();

        return $this->sendSuccess('SubProjectSurvey deleted successfully');
    }
}
