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

        return view('customers.index', compact('customers'));
   }

   public function create(){
       $companies = Company::all();
       $customer = new Customer();

       return view('customers.create', compact('companies', 'customer'));
   }

    public function store(CreateCustomerRequest $request){

        Customer::create($request->all());

        return redirect('customers');
    }

    public function show(Customer $customer){

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer){

        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(CreateCustomerRequest $request,Customer $customer){

        $request->persist($customer);

        return redirect('customers/'.$customer->id);
    }

    public function destroy(Customer $customer){

        $customer->delete();

        return redirect('customers');
    }
}
