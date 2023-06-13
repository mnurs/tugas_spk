<?php

namespace App\Http\Requests;

use App\Models\WisataData;
use Illuminate\Foundation\Http\FormRequest;

class CreateWisataDataRequest extends FormRequest
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
        return WisataData::$rules;
    }
}
