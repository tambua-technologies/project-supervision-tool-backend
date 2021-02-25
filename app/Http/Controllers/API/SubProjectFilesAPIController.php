<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MediaResource;
use App\Models\SubProject;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig;

class SubProjectFilesAPIController extends Controller
{


    /**
     * @SWG\Post(
     *     path="/sub_projects/{id}/upload_photo",
     *     consumes={"multipart/form-data"},
     *     tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *     description="Upload image to sub project",
     *     @SWG\Parameter(
     *         description="sub project id",
     *         format="int64",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Parameter(
     *         description="photo",
     *         in="formData",
     *         name="photo",
     *         required=false,
     *         type="file"
     *     ),
     *     @SWG\Parameter(
     *         description="Photo description",
     *         in="formData",
     *         name="description",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *         description="latitude(Decimal degrees format)",
     *         in="formData",
     *         name="latitude",
     *         required=false,
     *         type="number"
     *     ),
     *     @SWG\Parameter(
     *         description="longitude(Decimal degrees format)",
     *         in="formData",
     *         name="longitude",
     *         required=false,
     *         type="number"
     *     ),
     *     produces={"application/json"},
     *     @SWG\Response(
     *         response="200",
     *         description="successful operation",
     *     ),
     * )
     * @param Request $request
     * @param SubProject $subProject
     * @return mixed
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws ValidationException
     */
    public function upload(Request $request, SubProject $subProject)
    {
        $this->validate($request, [
            'photo' => 'nullable|image',
        ]);

            $photo = $subProject->addMediaFromRequest('photo')
                ->withCustomProperties([
                    'description' => $request->description,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'owner' => auth()->user()])
                ->toMediaCollection('photos');


        return new MediaResource($photo);
    }
}
