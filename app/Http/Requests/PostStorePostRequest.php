<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

/**
 * Class PostStorePostRequest
 * @property string caption
 * @property UploadedFile image
 * @package App\Http\Requests
 */
class PostStorePostRequest extends FormRequest
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
            'caption' => 'required',
            'image'   => ['required', 'image'],
        ];
    }
}
