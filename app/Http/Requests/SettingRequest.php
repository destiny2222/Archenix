<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'analysis_trackingid'=>['nullable', 'string'],
            'google_analytics'=>['nullable', 'string'],
            'metatag_keyword'=>['nullable', 'string'],
            'metatag_des'=>['nullable', 'string'],
            'terms_conditions'=>['nullable', 'string'],
        ];
    }
}
