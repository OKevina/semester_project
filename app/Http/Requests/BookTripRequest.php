<?php


use Illuminate\Foundation\Http\FormRequest;

class BookTripRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'NumTravelers' => 'required|integer|min:1',
        ];
    }
}
