<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTicketPriorityAPIRequest;
use App\Http\Requests\API\UpdateTicketPriorityAPIRequest;
use App\Models\TicketPriority;
use App\Repositories\TicketPriorityRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TicketPriorityController
 * @package App\Http\Controllers\API
 */

class TicketPriorityAPIController extends AppBaseController
{
    /** @var  TicketPriorityRepository */
    private $ticketPriorityRepository;

    public function __construct(TicketPriorityRepository $ticketPriorityRepo)
    {
        $this->ticketPriorityRepository = $ticketPriorityRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/ticket_priorities",
     *      summary="Get a listing of the TicketPriorities.",
     *      tags={"TicketPriority"},
     *     security={{"Bearer":{}}},
     *      description="Get all TicketPriorities",
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
     *                  @SWG\Items(ref="#/definitions/TicketPriority")
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
    public function index(Request $request): JsonResponse
    {
        $ticketPriorities = $this->ticketPriorityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ticketPriorities->toArray(), 'TicketPriorities retrieved successfully');
    }

    /**
     * @param CreateTicketPriorityAPIRequest $request
     *
     * @SWG\Post(
     *      path="/ticket_priorities",
     *      summary="Store a newly created TicketPriority in storage",
     *      tags={"TicketPriority"},
     *     security={{"Bearer":{}}},
     *      description="Store TicketPriority",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TicketPriority that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TicketPriorityPayload")
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
     *                  ref="#/definitions/TicketPriority"
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
    public function store(CreateTicketPriorityAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $ticketPriority = $this->ticketPriorityRepository->create($input);

        return $this->sendResponse($ticketPriority->toArray(), 'TicketPriority saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/ticket_priorities/{id}",
     *      summary="Display the specified TicketPriority",
     *      tags={"TicketPriority"},
     *     security={{"Bearer":{}}},
     *      description="Get TicketPriority",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TicketPriority",
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
     *                  ref="#/definitions/TicketPriority"
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
        /** @var TicketPriority $ticketPriority */
        $ticketPriority = $this->ticketPriorityRepository->find($id);

        if ($ticketPriority === null) {
            return $this->sendError('TicketPriority not found');
        }

        return $this->sendResponse($ticketPriority->toArray(), 'TicketPriority retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTicketPriorityAPIRequest $request
     *
     * @SWG\Put(
     *      path="/ticket_priorities/{id}",
     *      summary="Update the specified TicketPriority in storage",
     *      tags={"TicketPriority"},
     *     security={{"Bearer":{}}},
     *      description="Update TicketPriority",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TicketPriority",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TicketPriority that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TicketPriority")
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
     *                  ref="#/definitions/TicketPriority"
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
    public function update(int $id, UpdateTicketPriorityAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var TicketPriority $ticketPriority */
        $ticketPriority = $this->ticketPriorityRepository->find($id);

        if ($ticketPriority === null) {
            return $this->sendError('TicketPriority not found');
        }

        $ticketPriority = $this->ticketPriorityRepository->update($input, $id);

        return $this->sendResponse($ticketPriority->toArray(), 'TicketPriority updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/ticket_priorities/{id}",
     *      summary="Remove the specified TicketPriority from storage",
     *      tags={"TicketPriority"},
     *     security={{"Bearer":{}}},
     *      description="Delete TicketPriority",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TicketPriority",
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
        /** @var TicketPriority $ticketPriority */
        $ticketPriority = $this->ticketPriorityRepository->find($id);

        if ($ticketPriority === null) {
            return $this->sendError('TicketPriority not found');
        }

        $ticketPriority->delete();

        return $this->sendSuccess('TicketPriority deleted successfully');
    }
}
