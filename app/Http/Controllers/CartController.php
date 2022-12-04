<?php

namespace App\Http\Controllers;

use App\Models\TblCart;
use App\Models\TblProducts;
use App\Http\Requests\StoreTblCartRequest;
use App\Http\Requests\UpdateTblCartRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $num_cart = 0;
        $cartss = new TblCart;
        if ($request->session()->has('USER')) {
            $request->session()->forget('NUM_CART');
            $email = $request->session()->get('USER');
            $user = User::where('email',$email)->first();
            $carts = TblCart::where('user_id', $user->id)
                ->get();
            foreach ($carts as $cart) {
                $num_cart += $cart->quantity;
            }
            $cartss = $carts;
        }
        $request->session()->put('num_cart', $num_cart);

        return view('front-end.shopping-cart', [
            'cate' => 'shop', 'carts' => $cartss
        ]);
    }
    
    // public function shop(Request $request) {
    //     $request->session()->forget('FILTER_MODEL');
    //     return redirect('shop-search?page=1');
    // }

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
     * @param  \App\Http\Requests\StoreTblCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTblCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TblCart  $tblCart
     * @return \Illuminate\Http\Response
     */
    public function show(TblCart $tblCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TblCart  $tblCart
     * @return \Illuminate\Http\Response
     */
    public function edit(TblCart $tblCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTblCartRequest  $request
     * @param  \App\Models\TblCart  $tblCart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTblCartRequest $request, TblCart $tblCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TblCart  $tblCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(TblCart $tblCart)
    {
        //
    }
}
