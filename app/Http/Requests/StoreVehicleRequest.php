<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
        return [
            /*'primary_media'=>'image|required|max:2024|mimes:jpeg,png,jpg,JPG,gif,svg',
            'vehicle_type_id'=>'required',
            'brand_id'=>'required',
            'description'=>'required',*/
        ];
    }
}
