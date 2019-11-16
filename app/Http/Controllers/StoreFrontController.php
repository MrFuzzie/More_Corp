<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Product;
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
        return view('pages.storeFront', compact('products'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBid(Request $request, Product $product)
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

}
