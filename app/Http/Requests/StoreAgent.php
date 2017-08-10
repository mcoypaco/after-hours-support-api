<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Agent;

class StoreAgent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Agent::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee_number' => 'required|string',
            'name' => 'required|string',
        ];
    }
}
