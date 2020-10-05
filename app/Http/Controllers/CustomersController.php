<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
   public function list(){

       $activeCustomers = Customer::active()->get();
       $inactiveCustomers = Customer::inactive()->get();

//       $customers = Customer::all();

//       dd($customers);

        return view('internals.customers', compact('activeCustomers', 'inactiveCustomers'));
   }

    public function store(CreateCustomerRequest $request){

//        dd(request('name'));

//        $data = request()->validate([
//            'name'=>'required|min:3',
//            'email'=>'required|email',
//            'active'=>'required'
//        ]);

//        $customer = new Customer();
//        $customer->name = \request('name');
//        $customer->email = \request('email');
//        $customer->active = \request('active');
//        $customer->save();

//        Customer::create($data);

        Customer::create($request->all());

        return back();

    }
}
