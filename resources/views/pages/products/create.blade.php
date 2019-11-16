@extends('layouts.app')

@section('content')

    <div class="card">
        <h5 class="card-header bg-primary text-white text-center">Create product</h5>

        <form method="post" action="/products">

            @include('pages.products.partial-form')
        </form>
    </div>

    <div class="form-group mt-2">
        <a href="{{ URL::previous() }}" class="btn btn-outline-primary">Back</a>
    </div>

@endsection
