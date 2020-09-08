<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFocalPersonAPIRequest;
use App\Http\Requests\API\UpdateFocalPersonAPIRequest;
use App\Models\FocalPerson;
use App\Repositories\FocalPersonRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FocalPersonController
 * @package App\Http\Controllers\API
 */

class FocalPersonAPIController extends AppBaseController
{
    /** @var  FocalPersonRepository */
    private $focalPersonRepository;

    public function __construct(FocalPersonRepository $focalPersonRepo)
    {
        $this->focalPersonRepository = $focalPersonRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/focal_people",
     *      summary="Get a listing of the FocalPeople.",
     *      tags={"FocalPerson"},
     *      description="Get all FocalPeople",
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
     *                  @SWG\Items(ref="#/definitions/FocalPerson")
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
        $focalPeople = $this->focalPersonRepository->paginate($request->get('per_page', 15));

        return $this->sendResponse($focalPeople->toArray(), 'Focal People retrieved successfully');
    }

    /**
     * @param CreateFocalPersonAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/focal_people",
     *      summary="Store a newly created FocalPerson in storage",
     *      tags={"FocalPerson"},
     *      description="Store FocalPerson",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FocalPerson that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FocalPerson")
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
     *                  ref="#/definitions/FocalPerson"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFocalPersonAPIRequest $request)
    {
        $input = $request->all();


        $focalPerson = $this->focalPersonRepository->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        return $this->sendResponse($focalPerson->toArray(), 'Focal Person saved successfully');
    }

    /**
     *
     * @SWG\Post(
     *      path="/focal_people/login",
     *      summary="Login focal person",
     *      tags={"FocalPerson"},
     *      description="Login FocalPerson",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="auth payload",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/LoginFocalPerson")
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
     *                  ref="#/definitions/FocalPerson"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @param Request $request
     * @return
     */
    public function login(Request $request)
    {
        $loginDta = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);
        if(! auth()->attempt($loginDta)) {
            return response(['failed' => 'These credentials do not match our records.'],'200');
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return $this->sendResponse(['access_token' => $accessToken], 'login was successful');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/focal_people/{id}",
     *      summary="Display the specified FocalPerson",
     *      tags={"FocalPerson"},
     *      description="Get FocalPerson",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FocalPerson",
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
     *                  ref="#/definitions/FocalPerson"
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
        /** @var FocalPerson $focalPerson */
        $focalPerson = $this->focalPersonRepository->find($id);

        if (empty($focalPerson)) {
            return $this->sendError('Focal Person not found');
        }

        return $this->sendResponse($focalPerson->toArray(), 'Focal Person retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFocalPersonAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/focal_people/{id}",
     *      summary="Update the specified FocalPerson in storage",
     *      tags={"FocalPerson"},
     *      description="Update FocalPerson",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FocalPerson",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FocalPerson that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FocalPerson")
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
     *                  ref="#/definitions/FocalPerson"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFocalPersonAPIRequest $request)
    {
        $input = $request->all();

        /** @var FocalPerson $focalPerson */
        $focalPerson = $this->focalPersonRepository->find($id);

        if (empty($focalPerson)) {
            return $this->sendError('Focal Person not found');
        }

        $focalPerson = $this->focalPersonRepository->update($input, $id);

        return $this->sendResponse($focalPerson->toArray(), 'FocalPerson updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/focal_people/{id}",
     *      summary="Remove the specified FocalPerson from storage",
     *      tags={"FocalPerson"},
     *      description="Delete FocalPerson",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FocalPerson",
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
        /** @var FocalPerson $focalPerson */
        $focalPerson = $this->focalPersonRepository->find($id);

        if (empty($focalPerson)) {
            return $this->sendError('Focal Person not found');
        }

        $focalPerson->delete();

        return $this->sendSuccess('Focal Person deleted successfully');
    }
}
