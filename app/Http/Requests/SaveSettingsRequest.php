<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveSettingsRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        $rules = [];
        $settings = config('settings');

        array_map(function ($setting) use (&$rules, $settings) {
            $rules[$setting['short_title']] = $setting['rules'];
        } , array_values($settings));

        return $rules;
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return ['*.required' => 'All fields is required!'];
    }
}
