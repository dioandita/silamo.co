<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Validation\Rule;
use Gloudemans\Shoppingcart\Facades\Cart;
use RajaOngkir;



class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    $data=Cart::content();
    return view('home.pages.cart',compact('data'));
    }
    public function create($id)
    {
      $data= Product::find($id);
      Cart::add($id,$data->name, 1, $data->price);
      return redirect()->route('cart.index');

    }
    public function store(Request $request)
    {
       
    
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        $data= Product::find($id);
        Cart::add($id,$data->name, 1, $data->price);
        return redirect()->route('cart.index',compact('data'));
    }
    public function update(Request $request, $id)
    {   
        $qty=$request->qty;
        Cart::update($id, $qty); // Will update the quantity
        return back();
        
    }
    public function destroy($id)
    {

        \Cart::remove($id);
        return back();
    }
}
