<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleFormValidation extends FormRequest
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
        $article = $this->route('article');

        return [
            'title' =>  'required|unique:articles,title,NULL,id,deleted_at,NULL',
            'image' =>  'required|image|mimes:jpg,jpeg,png'
        ];
    }

    public function message()
    {
        return [
            'title.required' => 'Please Add the Title',
            'image.required' => 'Please Add an image'
        ];   
    }
}