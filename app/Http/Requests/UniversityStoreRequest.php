<?php
  
namespace App\Http\Requests;
  
use Illuminate\Foundation\Http\FormRequest;
  
class UniversityStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
  
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'image_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}