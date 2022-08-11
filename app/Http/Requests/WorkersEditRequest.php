<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkersEditRequest extends FormRequest
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
            
				"firstname" => "filled|string",
				"lastname" => "filled|string",
				"middlename" => "nullable|string",
				"gender" => "filled",
				"dob" => "nullable|date",
				"phone" => "filled|string",
				"email" => "nullable|email",
				"date_join" => "filled|date",
				"photo" => "nullable",
				"address" => "filled",
				"state_id" => "filled",
				"lga_id" => "nullable",
				"department_id" => "filled",
				"position_id" => "filled",
				"status" => "filled|string",
				"work_type_id" => "filled",
				"branch_id" => "filled",
				"cv" => "nullable",
            
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
