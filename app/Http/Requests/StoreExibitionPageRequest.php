<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExibitionPageRequest extends FormRequest
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

            'main_background_image' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:4096',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:4096',

            'main_breadcrumb_title_tm' => 'required|string|max:255',
            'main_breadcrumb_title_ru' => 'required|string|max:255',
            'main_breadcrumb_title_en' => 'required|string|max:255',

            'title_tm' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',

            'name_tm' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',

            'text_tm' => 'required|string',
            'text_ru' => 'required|string',
            'text_en' => 'required|string',

            'file_tm' => 'nullable|file|mimes:pdf,pptx,docx|max:4096',
            'file_ru' => 'nullable|file|mimes:pdf,pptx,docx|max:4096',
            'file_en' => 'nullable|file|mimes:pdf,pptx,docx|max:4096',

            'updated_by' => 'required|integer',
        ];
    }
}
