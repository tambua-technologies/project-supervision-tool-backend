<?php

namespace App\Http\Requests\API;

use App\Models\Actor;
use App\Models\Agency;
use App\Models\ImplementingPartner;
use InfyOm\Generator\Request\APIRequest;

class UpdateActorAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Actor::$rules;

        return $rules;
    }
}
