@extends('layout')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customers</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="customers" method="POST">
                <label for="Name">Name</label>
                <div class="form-group">
                    <input type="text" name="name" class="form-control">
                    <div>{{$errors->first('name')}}</div>
                </div>

                <label for="Email">Email</label>
                <div class="form-group">
                    <input type="text" name="email" class="form-control">
                    <div>{{$errors->first('email')}}</div>
                </div>

                <label for="active">Status</label>
                <div class="form-group">
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled> Select Customer Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>

                @csrf
            </form>
        </div>
    </div>

<hr>
    <div class="row">
        <div class="col-6">
            <ul>
                <h2>Active Customers</h2>
                @foreach($activeCustomers as $activeCustomer)
                    <li>{{$activeCustomer->name}} <span class="text-muted">({{$activeCustomer->email}})</span></li>
                @endforeach
            </ul>
        </div>

        <div class="col-6">
            <ul>
                <h2>Inactive Customers</h2>
                @foreach($inactiveCustomers as $inactiveCustomer)
                    <li>{{$inactiveCustomer->name}} <span class="text-muted">({{$inactiveCustomer->email}})</span></li>
                @endforeach
            </ul>
        </div>
    </div>


@endsection
