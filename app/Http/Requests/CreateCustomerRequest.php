<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'name'=>'required|min:3',
            'email'=>'required|email',
            'active'=>'required',
            'company_id'=>'required'
        ];
    }

    public function persist(Customer $customer)
    {
        $customers = Customer::all();

        $customer->name = $this->name;
        $customer->email = $this->email;
        $customer->active = $this->active;
        $customer->company_id = $this->company_id;


        $customer->save();
    }
}



