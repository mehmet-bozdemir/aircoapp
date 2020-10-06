<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateCustomerRequest;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
   public function index(){

       $customers = Customer::all();

//       dd($customers);

        return view('customers.index', compact('customers'));
   }

   public function create(){
       $companies = Company::all();

       return view('customers.create', compact('companies'));
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

        return redirect('customers');

    }
}
