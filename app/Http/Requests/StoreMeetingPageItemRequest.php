<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeetingPageItemRequest extends FormRequest
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

            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:4096',
            'title_tm' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',

            'text_tm' => 'required|string',
            'text_ru' => 'required|string',
            'text_en' => 'required|string',

            'file_tm' => 'nullable|file|mimes:pdf,pptx,docx|max:4096',
            'file_ru' => 'nullable|file|mimes:pdf,pptx,docx|max:4096',
            'file_en' => 'nullable|file|mimes:pdf,pptx,docx|max:4096',

            'status'                     => 'required|in:0,1',
            'position'                   => 'required|integer',
            'updated_by'                 => 'required|integer',
        ];
    }
}
