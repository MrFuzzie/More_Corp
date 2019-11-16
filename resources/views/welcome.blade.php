
@extends('layouts.visitor')

@section('content')
    <main role="main">

        <section class="jumbotron text-center w-100  border border-primary">
            <div class="container">
                <h1 class="jumbotron-heading">Lorem ipsum</h1>
                <p class="lead text-muted">Tristique et egestas quis ipsum. Eu augue ut lectus arcu. Bibendum neque egestas congue quisque egestas. Accumsan in nisl nisi scelerisque eu ultrices.</p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{$product->name}}</p>
                                <p class="card-text">{{$product->description}}</p>
                                <p class="card-text">{{'R '.$product->price}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/products/{{$product->id}}">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        </a>
                                        {{-- If user is a guest redirect them to the registration page * else open bid modal --}}
                                        @guest
                                            <a href="/login">
                                                <button type="button" class="btnBid btn btn-sm btn-outline-secondary">Bid</button>
                                            </a>
                                        @else
                                            <button type="button" class="btnBid btn btn-sm btn-outline-secondary" data-id="{{$product->id}}" data-toggle="modal" data-target="#bidModal">Bid</button>
                                        @endguest
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>
    @include('pages.bid')
@endsection

@section('js')
    @parent
    <script>

        $(function () {

           $('.btnBid').on('click', function () {

             var id = $(this).data('id');
             $('#bidForm').attr('action', '/product/'+ id +'/bid');
           });
        });
    </script>

@endsection
