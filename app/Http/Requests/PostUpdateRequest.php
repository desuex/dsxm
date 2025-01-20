<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->canWrite();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => "required|string|unique:posts,slug,{$this->post->id}",
            'publication_date' => 'nullable|date',
            'preview' => 'nullable|string',
            'text' => 'required|string',
            'is_published' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'chain_id' => 'nullable|exists:chains,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'canonical_url' => 'nullable|url',
            'tags'=> 'nullable|string',
        ];
    }
}
