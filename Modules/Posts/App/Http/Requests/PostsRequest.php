<?php

namespace Modules\Posts\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return request()->isMethod('put') || request()->isMethod('patch') ? $this->onUpdate() : $this->onCreate();
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function onCreate(): array
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|file|mimes:png,jpg'
        ];
    }
    public function onUpdate(): array
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|file|mimes:png,jpg'
        ];
    }
    public function authorize(): bool
    {
        return true;
    }
}
