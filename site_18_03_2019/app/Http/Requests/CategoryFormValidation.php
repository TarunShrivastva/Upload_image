<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormValidation extends FormRequest
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
        return [//|unique:modules,name,{$id},id,NULL,deleted_at
            'name' => 'required',
         'display' => 'required',
            'url'  => 'required',  
            'icon' => 'required' 
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Please Add the Category',
         'display.required' => 'Please Insert Display Name',
            'url.required'  => 'Url is required',  
            'icon.required' => 'Icon is required' 
        ];
    }
}
