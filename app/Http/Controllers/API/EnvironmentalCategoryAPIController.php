<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEnvironmentalCategoryAPIRequest;
use App\Http\Requests\API\UpdateEnvironmentalCategoryAPIRequest;
use App\Models\EnvironmentalCategory;
use App\Repositories\EnvironmentalCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EnvironmentalCategoryController
 * @package App\Http\Controllers\API
 */

class EnvironmentalCategoryAPIController extends AppBaseController
{
    /** @var  EnvironmentalCategoryRepository */
    private $environmentalCategoryRepository;

    public function __construct(EnvironmentalCategoryRepository $environmentalCategoryRepo)
    {
        $this->environmentalCategoryRepository = $environmentalCategoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/environmentalCategories",
     *      summary="Get a listing of the EnvironmentalCategories.",
     *      tags={"EnvironmentalCategory"},
     *      description="Get all EnvironmentalCategories",
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
     *                  @SWG\Items(ref="#/definitions/EnvironmentalCategory")
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
        $environmentalCategories = $this->environmentalCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($environmentalCategories->toArray(), 'Environmental Categories retrieved successfully');
    }

    /**
     * @param CreateEnvironmentalCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/environmentalCategories",
     *      summary="Store a newly created EnvironmentalCategory in storage",
     *      tags={"EnvironmentalCategory"},
     *      description="Store EnvironmentalCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="EnvironmentalCategory that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/EnvironmentalCategory")
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
     *                  ref="#/definitions/EnvironmentalCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEnvironmentalCategoryAPIRequest $request)
    {
        $input = $request->all();

        $environmentalCategory = $this->environmentalCategoryRepository->create($input);

        return $this->sendResponse($environmentalCategory->toArray(), 'Environmental Category saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/environmentalCategories/{id}",
     *      summary="Display the specified EnvironmentalCategory",
     *      tags={"EnvironmentalCategory"},
     *      description="Get EnvironmentalCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EnvironmentalCategory",
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
     *                  ref="#/definitions/EnvironmentalCategory"
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
        /** @var EnvironmentalCategory $environmentalCategory */
        $environmentalCategory = $this->environmentalCategoryRepository->find($id);

        if (empty($environmentalCategory)) {
            return $this->sendError('Environmental Category not found');
        }

        return $this->sendResponse($environmentalCategory->toArray(), 'Environmental Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEnvironmentalCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/environmentalCategories/{id}",
     *      summary="Update the specified EnvironmentalCategory in storage",
     *      tags={"EnvironmentalCategory"},
     *      description="Update EnvironmentalCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EnvironmentalCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="EnvironmentalCategory that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/EnvironmentalCategory")
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
     *                  ref="#/definitions/EnvironmentalCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEnvironmentalCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var EnvironmentalCategory $environmentalCategory */
        $environmentalCategory = $this->environmentalCategoryRepository->find($id);

        if (empty($environmentalCategory)) {
            return $this->sendError('Environmental Category not found');
        }

        $environmentalCategory = $this->environmentalCategoryRepository->update($input, $id);

        return $this->sendResponse($environmentalCategory->toArray(), 'EnvironmentalCategory updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/environmentalCategories/{id}",
     *      summary="Remove the specified EnvironmentalCategory from storage",
     *      tags={"EnvironmentalCategory"},
     *      description="Delete EnvironmentalCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EnvironmentalCategory",
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
        /** @var EnvironmentalCategory $environmentalCategory */
        $environmentalCategory = $this->environmentalCategoryRepository->find($id);

        if (empty($environmentalCategory)) {
            return $this->sendError('Environmental Category not found');
        }

        $environmentalCategory->delete();

        return $this->sendSuccess('Environmental Category deleted successfully');
    }
}
