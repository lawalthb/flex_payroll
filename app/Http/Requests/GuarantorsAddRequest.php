<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuarantorsAddRequest extends FormRequest
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
            
				"worker_id" => "required",
				"fullname" => "required|string",
				"address" => "required",
				"phone" => "required|string",
				"email" => "nullable|email",
				"relationship" => "nullable",
				"otherinfo" => "nullable",
				"hardcopy" => "nullable",
            
        ];
    }

	public function messages()
    {
        return [
			
            //using laravel default validation messages
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //eg = 'name' => 'trim|capitalize|escape'
        ];
    }
}
