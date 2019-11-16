<?php

namespace App\Http\Controllers;

use App\Events\UniqueViewEvent;
use App\Http\Requests\StoreProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where(function ($query){
            $query->orWhere('name', 'LIKE', '%'.request('search').'%')
                ->orWhere('sku', 'LIKE', '%'.request('search').'%');
        })
        ->paginate(20);
        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Initiate a new customer instance * used to set default form value */
        $product = new Product();

        return view('pages.products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param StoreProduct $storeProduct => validation
     * @return to product
     */
    public function store(Request $request, StoreProduct $storeProduct)
    {
        DB::beginTransaction();
        try{

            /* Generate a simple random sku with the product name as a prefix */
            $sku = $request->name.'-'.rand(1,9).'-'.rand(99,1000);

            $product = Product::Create([

                'name' => $request->name,
                'description' => $request->description,
                'sku' => $sku,
                'price' => $request->price
            ]);

            DB::commit();
            return redirect('/products/'.$product->id);
        }catch(\Exception $e){

            /* Exception to be added to a log file at a later stage */
            DB::rollBack();
            return back()->withErrors('There was a problem saving the product please try again later','errors');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        event(new UniqueViewEvent($product));

        return view('pages.products.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param StoreProduct $storeProduct => validation
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreProduct $storeProduct, Product $product)
    {
        DB::beginTransaction();
        try{

            /* Generate a simple random sku with the product name as a prefix */
            $product->Update([

                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price
            ]);

            DB::commit();
            return redirect('/products');

        }catch(\Exception $e){

            /* Exception to be added to a log file at a later stage */
            DB::rollBack();
            return back()->withErrors('There was a problem saving the product please try again later','errors');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
        }catch (\Exception $e){
            return back()->withErrors('Product could not be deleted please try again later', 'errors');
        }
        return redirect('/products');
    }
}
