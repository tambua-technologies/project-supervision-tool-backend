<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSectorAPIRequest;
use App\Http\Requests\API\UpdateSectorAPIRequest;
use App\Models\Sector;
use App\Repositories\SectorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SectorController
 * @package App\Http\Controllers\API
 */

class SectorAPIController extends AppBaseController
{
    /** @var  SectorRepository */
    private $sectorRepository;

    public function __construct(SectorRepository $sectorRepo)
    {
        $this->sectorRepository = $sectorRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sectors",
     *      summary="Get a listing of the Sectors.",
     *      tags={"Sector"},
     *     security={{"Bearer":{}}},
     *      description="Get all Sectors",
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
     *                  @SWG\Items(ref="#/definitions/Sector")
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
        $sectors = $this->sectorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sectors->toArray(), 'Sectors retrieved successfully');
    }

    /**
     * @param CreateSectorAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sectors",
     *      summary="Store a newly created Sector in storage",
     *      tags={"Sector"},
     *     security={{"Bearer":{}}},
     *      description="Store Sector",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Sector that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Sector")
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
     *                  ref="#/definitions/Sector"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSectorAPIRequest $request)
    {
        $input = $request->all();

        $sector = $this->sectorRepository->create($input);

        return $this->sendResponse($sector->toArray(), 'Sector saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sectors/{id}",
     *      summary="Display the specified Sector",
     *      tags={"Sector"},
     *     security={{"Bearer":{}}},
     *      description="Get Sector",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sector",
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
     *                  ref="#/definitions/Sector"
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
        /** @var Sector $sector */
        $sector = $this->sectorRepository->find($id);

        if (empty($sector)) {
            return $this->sendError('Sector not found');
        }

        return $this->sendResponse($sector->toArray(), 'Sector retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSectorAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sectors/{id}",
     *      summary="Update the specified Sector in storage",
     *      tags={"Sector"},
     *     security={{"Bearer":{}}},
     *      description="Update Sector",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sector",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Sector that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Sector")
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
     *                  ref="#/definitions/Sector"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSectorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sector $sector */
        $sector = $this->sectorRepository->find($id);

        if (empty($sector)) {
            return $this->sendError('Sector not found');
        }

        $sector = $this->sectorRepository->update($input, $id);

        return $this->sendResponse($sector->toArray(), 'Sector updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sectors/{id}",
     *      summary="Remove the specified Sector from storage",
     *      tags={"Sector"},
     *     security={{"Bearer":{}}},
     *      description="Delete Sector",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Sector",
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
        /** @var Sector $sector */
        $sector = $this->sectorRepository->find($id);

        if (empty($sector)) {
            return $this->sendError('Sector not found');
        }

        $sector->delete();

        return $this->sendSuccess('Sector deleted successfully');
    }
}
