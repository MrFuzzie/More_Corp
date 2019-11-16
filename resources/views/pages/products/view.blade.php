
@guest
    @extends('layouts.visitor')
@else
    {{--@if(Auth::user()->type == 1)--}}
        {{--@extends('layouts.app')--}}
    {{--@else--}}
        {{--@extends('layouts.visitor')--}}
    {{--@endif--}}
@endguest

@section('content')

    <div class="card">
        <h5 class="card-header bg-primary text-white text-center">{{$product->name}}</h5>

        <div class="card-body">

            <div class="container w-100">
                <div class="row">
                    <div class="col m-0 p-0 w-auto">
                        <img src="https://via.placeholder.com/250" />
                    </div>
                    <div class="col w-75">
                        <div class="form-group row">
                            <label class="mr-1">Name : </label>
                            <p>{{$product->name}}</p>
                        </div>

                        <div class="form-group row">
                            <label class="mr-1">Descripton :</label>
                            <p>{{$product->description}}</p>
                        </div>

                        <div class="form-group row">
                            <label class="mr-1">Sku : </label>
                            <p>{{$product->sku}}</p>
                        </div>

                        <div class="form-group row">
                            <label class="mr-1">Price : </label>
                            <p>{{' R '. $product->price}}</p>
                        </div>

                    </div>

                    <div class="col w-25 ml-2">

                        <div class="form-group row">
                            <label class="mr-1">Highest Bid : </label>
                            <p>{{'R '.($product->bids->count() > 0 ? $product->bids->max('bid') : '0.00')}}</p>
                        </div>

                        <div class="form-group row">
                            <label class="mr-1">Average Bid :</label>
                            <p>{{'R '.($product->bids->count() > 0 ? $product->bids->avg('bid') : '0.00')}}</p>
                        </div>

                        @if(Auth::check())

                            @php
                                $user = Auth::user();
                                $userType = $user->type;
                                $userBids = ($user->bids->count() > 0 ? 'R '.$user->bids->where('product_id', $product->id)->first()->bid : '');
                            @endphp

                            @if($userType == 0 && $userBids !== '')

                                <div class="form-group row">
                                    <label class="mr-1">My Bid :</label>
                                    <p>{{$userBids}}</p>
                                </div>
                            @endif

                            @if($userType == 1)

                                <div class="form-group row">
                                    <label class="mr-1">Average Bid :</label>
                                    <p>{{'R '.($product->bids->count() > 0 ?$product->bids->avg('bid') : '0.00')}}</p>
                                </div>

                                <div class="form-group row">
                                    <label class="mr-1">Views :</label>
                                    <p>{{$product->views->count()}}</p>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            @if(Auth::check() && $userType == 1)
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

