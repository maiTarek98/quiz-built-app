<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
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
            'title' => 'required|string',
            'no_question' => 'required|integer',
            'score_question' => 'required|integer|max:2',
            'status' => 'required|in:show,hide',
            'passing_score' => 'required|integer|max:2',
            'description' => '',
            'user_id' => 'integer',
        ];
    }
}
