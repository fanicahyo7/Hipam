<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RetribusiRequest extends FormRequest
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
            'retribusi_name' => 'required|max:255',
            'tarif1' => 'required|integer',
            'tarif2' => 'required|integer',
            'abonemen' => 'required|integer',
            'kompensasi' => 'required|integer',
        ];
    }
}
