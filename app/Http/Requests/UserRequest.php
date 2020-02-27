<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class UserRequest extends FormRequest
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
            'name' => 'required|max:20',
            'sex' => 'max:20',
            'job' => 'max:20',
            'age' => 'max:20',
            'description' => 'max:1000',
            'image' => 'file|image|mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }
}
