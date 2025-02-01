<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class StoreLabelRequest extends FormRequest
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
    protected function prepareForValidation(): void
    {
        $this->merge([
            'updated_by' => auth()->user()->id,
        ]);

    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_tm'                       => 'required|string|max:255',
            'title_ru'                       => 'required|string|max:255',
            'title_en'                       => 'required|string|max:255',
            'color'                          => 'required|string|max:255',
            'updated_by'                     => 'required|integer',
        ];
    }
}
