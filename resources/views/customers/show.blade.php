@extends('layout')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Details for {{$customer->name}}</h1>
            <div class="d-flex">
                <p><a href="/customers/{{$customer->id}}/edit" class="btn btn-primary">Edit</a></p>

                <form action="/customers/{{$customer->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-3">DELETE</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Name</strong> {{$customer->name}}</p>
            <p><strong>Email</strong> {{$customer->email}}</p>
            <p><strong>Company</strong> {{$customer->company->name}}</p>
        </div>
    </div>



@endsection

