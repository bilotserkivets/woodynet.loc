<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostCreateRequest extends FormRequest
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
            'title'       => 'required|min:5|max:200|unique:blog_posts',
            'slug'        => 'max:200|unique:blog_posts',
            'excerpt'     => 'required|string|min:5|max:200',
            'content_raw' => 'required|string|min:5|max:10000',
            'category_id' => 'required|integer|exists:blog_categories,id',
        ];
    }
    
    /**
     * Get the error for the defined varidation rules
     * 
     * @return array
     */
    public function messages() 
    {
        return [
            'title.required'       => 'Введіть заголовок статті',
            'title.min'            => 'Мінімальна довжина заголовку [:min] символів',
            'title.max'            => 'Максимальна довжина заголовку [:max] символів',
            'title.unique'         => 'Такий заголовок вже використовується, введіть щось інше',
            'slug.max'             => 'Максимальна довжина ідентифікатору [:max] символів',
            'slug.unique'          => 'Тикий ідентифікатор вже використовується, введіть щось інше',
            'excerpt.required'     => 'Введіть короткий текст статті',
            'excerpt.string'       => 'Короткий текст статті повинен бути строковим значенням',
            'excerpt.min'          => 'Мінімальна довжина короткого змісту [:min] символів',
            'excerpt.max'          => 'Максимальна довжина короткого змісту [:max] символів',
            'content_raw.required' => 'Введіть текст статті',
            'content_raw.string'   => 'Текст статті повинен бути строковим значенням',
            'content_raw.min'      => 'Мінімальна довжина тексту [:min] символів',
            'content_raw.max'      => 'Максимальна довжина тексту [:max] символів',
            'category_id.required' => 'Виберіть категорію',
        ];
    }
    
    /**
     * Get custom attributes for validator errors
     * 
     * @return array
     */
    public function attributes() 
    {
        return [
            'title' => 'заголовок',
        ];
    }
}
