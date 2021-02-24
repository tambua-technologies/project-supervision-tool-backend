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
     *     path="/sub_projects/{id}/upload_image",
     *     consumes={"multipart/form-data"},
     *     tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *     description="Upload image to sub project",
     *     @SWG\Parameter(
     *         description="Additional data to pass to server",
     *         in="formData",
     *         name="description",
     *         required=false,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *         description="cover photo to upload",
     *         in="formData",
     *         name="cover_photo",
     *         required=false,
     *         type="file"
     *     ),
     *     @SWG\Parameter(
     *         description="location id",
     *         format="string",
     *         in="formData",
     *         name="location_id",
     *         required=false,
     *         type="integer"
     *     ),
     *     @SWG\Parameter(
     *         description="sub project id",
     *         format="int64",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
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
            'cover_photo' => 'nullable|image',
        ]);

            $cover_photo = $subProject->addMediaFromRequest('cover_photo')
                ->withCustomProperties(['description' => $request->description, 'owner' => auth()->user()])
                ->toMediaCollection('cover_photo');


        return new MediaResource($cover_photo);
    }
}
