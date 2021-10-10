<?php

namespace App\Http\Requests;

use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//لازم اخلي ديه بترو عشان ميطلعيش اككسبشن هناك يقولي انت مش  authorize
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'title'=>'required|string|max:100|min:3',
                'post_description'=>'required|string|max:1000|min:3',
        ];
    }

    function messages()
    {
        return [
            'title.required'=>'OPPs! You must type a title!',
            'title.max'=>'Sorry.. Your title should be more less than 100 letters ',
            'title.min'=>'Sorry.. Your title should be more than 3 letters ',
            'post_description.required'=>'You should send you description, it\'s empty!',
            'post_description.max'=>'Sorry.. Your description should be more less than 1000 letters ',
            'post_description.min'=>'Sorry.. Your description should be more than 3 letters ',
        ];
    }

}