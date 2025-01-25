<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Action\ResponseProtocol;
use App\Action\Authenticate; 

class CartController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $user = Authenticate::issLogin($request);
         $cart = Cart::with('product','product.subCategory')->where('user_id',$user->id)->get();
        return ResponseProtocol::success($cart);
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $validated = $request->validate([
                'product_id' => 'required',
                'quantity' => 'required',
            ]);

            $user = Authenticate::issLogin($request);

            $cart=Cart::create([
                'product_id' => $validated['product_id'],
                'quantity' => $validated['quantity'],
                'user_id' => $user->id,
            ]);

            return ResponseProtocol::success($cart);

        } catch (\Throwable $th) {
            //throw $th;
            return ResponseProtocol::failed($th->getMessage());
        }
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        try {
            //code...
            $validated = $request->validate([
                'product_id' => 'required',
                'quantity' => 'required',
            ]);

            $user = Authenticate::issLogin($request);

            $cart=Cart::where('id',$request->cart)->where('user_id',$user->id)->update([
                'product_id' => $validated['product_id'],
                'quantity' => $validated['quantity'],
                'user_id' => $user->id,
            ]);

            return ResponseProtocol::success($cart);

        } catch (\Throwable $th) {
            //throw $th;
            return ResponseProtocol::failed($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        try {
            //code...
            $user = Authenticate::issLogin($request);

            $cart=Cart::where('id',$request->cart)->where('user_id',$user->id)->delete();

            return ResponseProtocol::success($cart);

        } catch (\Throwable $th) {
            //throw $th;
            return ResponseProtocol::failed($th->getMessage());
        }
        
    }
}
