<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProgressAPIRequest;
use App\Http\Requests\API\UpdateProgressAPIRequest;
use App\Models\Progress;
use App\Repositories\ProgressRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProgressController
 * @package App\Http\Controllers\API
 */

class ProgressAPIController extends AppBaseController
{
    /** @var  ProgressRepository */
    private $progressRepository;

    public function __construct(ProgressRepository $progressRepo)
    {
        $this->progressRepository = $progressRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/progress",
     *      summary="Get a listing of the Progress.",
     *      tags={"Progress"},
     *      description="Get all Progress",
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
     *                  @SWG\Items(ref="#/definitions/Progress")
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
        $progress = $this->progressRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($progress->toArray(), 'Progress retrieved successfully');
    }

    /**
     * @param CreateProgressAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/progress",
     *      summary="Store a newly created Progress in storage",
     *      tags={"Progress"},
     *      description="Store Progress",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Progress that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Progress")
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
     *                  ref="#/definitions/Progress"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProgressAPIRequest $request)
    {
        $input = $request->all();

        $progress = $this->progressRepository->create($input);

        return $this->sendResponse($progress->toArray(), 'Progress saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/progress/{id}",
     *      summary="Display the specified Progress",
     *      tags={"Progress"},
     *      description="Get Progress",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Progress",
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
     *                  ref="#/definitions/Progress"
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
        /** @var Progress $progress */
        $progress = $this->progressRepository->find($id);

        if (empty($progress)) {
            return $this->sendError('Progress not found');
        }

        return $this->sendResponse($progress->toArray(), 'Progress retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProgressAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/progress/{id}",
     *      summary="Update the specified Progress in storage",
     *      tags={"Progress"},
     *      description="Update Progress",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Progress",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Progress that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Progress")
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
     *                  ref="#/definitions/Progress"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProgressAPIRequest $request)
    {
        $input = $request->all();

        /** @var Progress $progress */
        $progress = $this->progressRepository->find($id);

        if (empty($progress)) {
            return $this->sendError('Progress not found');
        }

        $progress = $this->progressRepository->update($input, $id);

        return $this->sendResponse($progress->toArray(), 'Progress updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/progress/{id}",
     *      summary="Remove the specified Progress from storage",
     *      tags={"Progress"},
     *      description="Delete Progress",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Progress",
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
        /** @var Progress $progress */
        $progress = $this->progressRepository->find($id);

        if (empty($progress)) {
            return $this->sendError('Progress not found');
        }

        $progress->delete();

        return $this->sendSuccess('Progress deleted successfully');
    }
}
