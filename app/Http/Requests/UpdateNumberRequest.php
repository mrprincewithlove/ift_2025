<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UpdateNumberRequest extends FormRequest
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
            'status' => $this->status ? 1 : 0,
            'position'=> $this->position ? $this->position : 1,
            'number'=> $this->number ? $this->number : 1,
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
            'number'                         => 'required|integer',
            'icon'                           => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:4096',
            'status'                         => 'required|in:0,1',
            'position'                       => 'required|integer',
            'updated_by'                     => 'required|integer',
        ];
    }
}
