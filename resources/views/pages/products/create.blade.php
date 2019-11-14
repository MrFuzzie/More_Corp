@extends('layouts.app')

@section('content')

    <div class="card">
        <h5 class="card-header bg-primary text-white">Create product</h5>

        <form method="post" action="/products">
            @include('pages.products.partial-form')
        </form>
    </div>

@endsection
