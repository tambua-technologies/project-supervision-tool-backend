<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBorrowerAPIRequest;
use App\Http\Requests\API\UpdateBorrowerAPIRequest;
use App\Models\Borrower;
use App\Repositories\BorrowerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BorrowerController
 * @package App\Http\Controllers\API
 */

class BorrowerAPIController extends AppBaseController
{
    /** @var  BorrowerRepository */
    private $borrowerRepository;

    public function __construct(BorrowerRepository $borrowerRepo)
    {
        $this->borrowerRepository = $borrowerRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/borrowers",
     *      summary="Get a listing of the Borrowers.",
     *      tags={"Borrower"},
     *     security={{"Bearer":{}}},
     *      description="Get all Borrowers",
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
     *                  @SWG\Items(ref="#/definitions/Borrower")
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
        $borrowers = $this->borrowerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($borrowers->toArray(), 'Borrowers retrieved successfully');
    }

    /**
     * @param CreateBorrowerAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/borrowers",
     *      summary="Store a newly created Borrower in storage",
     *      tags={"Borrower"},
     *     security={{"Bearer":{}}},
     *      description="Store Borrower",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Borrower that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Borrower")
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
     *                  ref="#/definitions/Borrower"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBorrowerAPIRequest $request)
    {
        $input = $request->all();

        $borrower = $this->borrowerRepository->create($input);

        return $this->sendResponse($borrower->toArray(), 'Borrower saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/borrowers/{id}",
     *      summary="Display the specified Borrower",
     *      tags={"Borrower"},
     *     security={{"Bearer":{}}},
     *      description="Get Borrower",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Borrower",
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
     *                  ref="#/definitions/Borrower"
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
        /** @var Borrower $borrower */
        $borrower = $this->borrowerRepository->find($id);

        if (empty($borrower)) {
            return $this->sendError('Borrower not found');
        }

        return $this->sendResponse($borrower->toArray(), 'Borrower retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateBorrowerAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/borrowers/{id}",
     *      summary="Update the specified Borrower in storage",
     *      tags={"Borrower"},
     *     security={{"Bearer":{}}},
     *      description="Update Borrower",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Borrower",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Borrower that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Borrower")
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
     *                  ref="#/definitions/Borrower"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBorrowerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Borrower $borrower */
        $borrower = $this->borrowerRepository->find($id);

        if (empty($borrower)) {
            return $this->sendError('Borrower not found');
        }

        $borrower = $this->borrowerRepository->update($input, $id);

        return $this->sendResponse($borrower->toArray(), 'Borrower updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/borrowers/{id}",
     *      summary="Remove the specified Borrower from storage",
     *      tags={"Borrower"},
     *     security={{"Bearer":{}}},
     *      description="Delete Borrower",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Borrower",
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
        /** @var Borrower $borrower */
        $borrower = $this->borrowerRepository->find($id);

        if (empty($borrower)) {
            return $this->sendError('Borrower not found');
        }

        $borrower->delete();

        return $this->sendSuccess('Borrower deleted successfully');
    }
}
