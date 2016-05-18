<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreBlogRequest extends Request
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
        $rules = [
            'description' => 'required',
            'content' => 'required'
        ];

        $id = $this->input('id');
        if (is_null($id)) {
            $rules['title'] = 'required|max:255|unique:blogs,title';
        } else {
            $rules['title'] = 'required|max:255|unique:blogs,title,' . $this->input('id');
        }

        return $rules;
    }
}
