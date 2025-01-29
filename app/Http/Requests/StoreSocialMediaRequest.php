<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class StoreSocialMediaRequest extends FormRequest
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
            'link'                       => 'required|url|max:255',
            'icon'                       => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:4096',
            'status'                     => 'required|in:0,1',
            'position'                   => 'required|integer',
            'updated_by'                 => 'required|integer',
        ];
    }
}
