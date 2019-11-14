@extends('layouts.app')

@section('content')

    <div class="card">
        <h5 class="card-header bg-primary text-white text-center">View product</h5>

        <div class="card-body w-75 mx-auto">

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" readonly id="name" value="{{$product->name}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" readonly id="description" value="{{$product->description}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="sku" class="col-sm-2 col-form-label">SKU :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" readonly id="sku" value="{{$product->sku}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" readonly id="price" value="{{$product->price}}">
                </div>
            </div>
        </div>
    </div>

@endsection

