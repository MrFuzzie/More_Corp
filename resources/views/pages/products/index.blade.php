@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Products</h1>
    </div>

    <div>
        <form method="get" action="/products">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search name or sku..." aria-label="search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <input type="submit" class="input-group-text btn btn-outline-primary" value="Search"/>
                </div>
            </div>
        </form>
    </div>

    <table class="table table-striped table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Sku</th>
                <th scope="col">Price</th>
                <th scope="col">Views</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->sku}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->views->count()}}</td>
                    <td>
                        <div class="dropdown show">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a href="/products/{{$product->id}}" class="dropdown-item">
                                    <span data-feather="eye"></span>
                                    View
                                </a>
                                <a href="/products/{{$product->id}}/edit" class="dropdown-item">
                                    <span data-feather="edit"></span>
                                    Edit
                                </a>
                                <form class="delete" action="/products/{{$product->id}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-link dropdown-item" role="link">
                                        <span data-feather="trash"></span>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$products->appends(request()->input())->links()}}
@endsection

@section('js')
    @parent
    <script>
        $(function () {

            $(".delete").on("submit", function () {
                return confirm("Are you sure?");
            });
        });
    </script>
@endsection
