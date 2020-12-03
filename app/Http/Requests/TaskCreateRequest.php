<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreateRequest extends FormRequest
{
    protected $errorBag = 'taskCreate';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['bail', 'required', 'string'],
            'status' => ['bail', 'required', 'boolean'],
        ];
    }
}
