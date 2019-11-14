@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Products</h1>
    </div>


    <table class="table table-striped table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Sku</th>
                <th scope="col">Price</th>
                <th scope="col">View</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
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
                    <td><a href="/products/{{$product->id}}">View</a></td>
                    <td><a href="/products/{{$product->id}}/edit">Edit</a></td>
                    <td>
                        <form class="delete" action="/products/{{$product->id}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
