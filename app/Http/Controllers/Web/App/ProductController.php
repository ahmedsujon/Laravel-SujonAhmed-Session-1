<?php

namespace App\Http\Controllers\Web\App;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\MOdels\Category;
use DB;

class ProductController extends Controller
{
    public function index()
        {
            $products = Product::all();
            return view('thelow.products', compact('products'));
        }

    public function cart()
        {
            return view('thelow.cart');
        }

    public function addToCart($id)
            {
                $product = Product::find($id);

                if(!$product) {

                    abort(404);

                }

                $cart = session()->get('cart');

                if(!$cart) {

                    $cart = [
                            $id => [
                                "name" => $product->name,
                                "quantity" => 1,
                                "price" => $product->price,
                                "image" => $product->image
                            ]
                    ];

                    session()->put('cart', $cart);

                    return redirect()->back()->with('success', 'Product added to cart successfully!');
                }

                if(isset($cart[$id])) {

                    $cart[$id]['quantity']++;

                    session()->put('cart', $cart);

                    return redirect()->back()->with('success', 'Product added to cart successfully!');

                }

                // if item not exist in cart then add to cart with quantity = 1
                $cart[$id] = [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ];

                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }

            public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
