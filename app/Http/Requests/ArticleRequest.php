<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date'
        ];
    }

    /**
     * Sets custom error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Du måste fylla i en rubirk.',
            'body.required'  => 'Du måste fylla i body.',
            'title.min'      => 'Din rubrik måste vara längre än 3 tecken.',
            'publiched_at.required' => "Du måste fylla i ett publiseringsdatum."
        ];
    }
}
