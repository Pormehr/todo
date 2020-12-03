<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    protected $errorBag = 'taskUpdate';

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
