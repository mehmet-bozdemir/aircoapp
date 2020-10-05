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
                </div>
                <div>{{$errors->first('name')}}</div>
                <label for="Email">Email</label>
                <div class="form-group">
                    <input type="text" name="email" class="form-control">
                </div>
                <div>{{$errors->first('email')}}</div>
                <button type="submit" class="btn btn-primary">Add Customer</button>

                @csrf
            </form>
        </div>
    </div>

<hr>
    <div class="row">
        <div class="col-12">
            <ul>
                @foreach($customers as $customer)
                    <li>{{$customer->name}} <span class="text-muted">({{$customer->email}})</span></li>
                @endforeach
            </ul>
        </div>
    </div>


@endsection
