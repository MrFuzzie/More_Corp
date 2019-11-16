<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Product;
use App\StoreFront;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('welcome', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        if(!Auth::check()){
            return back()->withErrors('Please sign in to make a bid.', 'errors');
        }

        try {
            Bid::create([

                'product_id' => $product->id,
                'user_id' => Auth::user()->id,
                'bid' => $request->bid,

            ]);
        }
        catch (\Exception $e){
            return back()->withErrors('There was a problem processing the bid please try again later', 'errors');
        }
        return redirect('/products/'.$product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StoreFront  $storeFront
     * @return \Illuminate\Http\Response
     */
    public function show(StoreFront $storeFront)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StoreFront  $storeFront
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreFront $storeFront)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StoreFront  $storeFront
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreFront $storeFront)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StoreFront  $storeFront
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreFront $storeFront)
    {
        //
    }
}
