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
        return [
            'title' =>  'required',
            // 'image' =>  'required|mimes:jpg,jpeg,png'
        ];
    }

    public function message()
    {
        return [
            'title.required' => 'Please Add the Title',
            // 'image.required' => 'Please choose an Image',
        ];   
    }
}

// /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array
//      */
//     public function rules()
//     {
//         return [
//             'title'  =>  'required',
//             'author' => 'required',
//             'image'  => 'required|mimes:jpg,jpeg,png'
//         ];
//     }

//     public function message()
//     {
//         return [
//             'title.required'    =>  'Please Add the Title',
//             'author.required'   =>  'Please Insert Author Name',
//             'image.required'    =>  'Please Insert an Image'
//         ];
//     }