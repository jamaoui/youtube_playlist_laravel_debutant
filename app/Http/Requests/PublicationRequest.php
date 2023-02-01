<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titre'=> 'required|min:5|max:150',
            'body'=> 'required|min:20',
            'image' => 'image|mimes:png,jpg,jpeg,svg|max:10240'

        ];
    }

}
