@if(Auth::user()->type == 1)

@else
    @extends('layouts.visitor')
@endif

@section('content')

    <div class="card">
        <h5 class="card-header bg-primary text-white text-center">View product</h5>

        <div class="card-body">

            <div class="container w-100">
                <div class="row">
                    <div class="col w-75">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name :</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control-plaintext" readonly id="name" value="{{$product->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description :</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control-plaintext" readonly id="description" value="{{$product->description}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sku" class="col-sm-3 col-form-label">SKU :</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control-plaintext" readonly id="sku" value="{{$product->sku}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Price :</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control-plaintext" readonly id="price" value="{{'R '. $product->price}}">
                            </div>
                        </div>
                    </div>
                    @php
                        $user = Auth::user();
                        $userType = $user->type;
                        $userBids = $user->bids->where('product_id', $product->id)->first();
                    @endphp

                    <div class="col w-25 ml-2">
                        <div class="form-group row">
                            <label for="sku" class="col-sm-3 col-form-label">Highest Bid :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" readonly id="sku" value="{{'R '.$product->bids->max('bid')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sku" class="col-sm-3 col-form-label">Average Bid :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" readonly id="sku" value="{{'R '.$product->bids->avg('bid')}}">
                            </div>
                        </div>

                        @if($userType == 1)
                        <div class="form-group row">
                            <label for="sku" class="col-sm-3 col-form-label">Average Bid :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" readonly id="sku" value="{{'R '.$product->bids->avg('bid')}}">
                            </div>
                        </div>
                        @endif


                        @if($userType == 0 && $userBids)
                            <div class="form-group row">
                                <label for="sku" class="col-sm-3 col-form-label">My Bid :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext" readonly id="sku" value="{{'R '.$userBids->bid}}">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if($userType == 1)
            <hr>
            <div class="container mt-5">
                <h2 class="text-center">Bids</h2>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Bid</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($product->bids as $bid)
                            <tr>
                                <td>{{ $bid->user->email }}</td>
                                <td>{{'R '. $bid->bid }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>

@endsection

