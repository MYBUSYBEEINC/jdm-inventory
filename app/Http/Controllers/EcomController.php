<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;
use App\Brand;
use App\User;
use App\Classification;
use App\Color;
use App\Unit;
use App\Subcategory;
use App\ProductImage;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Session;

class EcomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::orderByRaw("RAND()")->get();
        $productmb = Product::where('category_id', '2')->orderByRaw("RAND()")->paginate(3);

        return view('ecommerce.home', compact('brands', 'categories', 'products', 'productmb', 'processors'));
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
    public function product($id)
    {
        $brand = Brand::all();
        $category= Category::all();
        $productImages = ProductImage::where('product_id', $id)->get();
        $product = Product::where('id', $id)->first();
        $suggested = Product::where('id', '!=', $id)->paginate(3);

        return view('ecommerce.product', compact('product', 'suggested', 'productImages', 'category', 'brand')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function addToCart(request $request, $id)
    {
        $product = Product::find($id);
        $cart = Session::get('cart');

        if(isset($cart[$id]))
        {
            $cart[$id]['quantity'] += $request['quantity'];
            Session::put('cart', $cart);
            
            $notification = array(
                'message' => 'Item is already in cart',
                'alert-type' => 'info'
            );

            return back()->with($notification);

        }

        $cart[$id] = [
            'id' => $product->id,
            'product_name' => $product->product_name,
            'description' => $product->description,
            'price_min' => $product->price_min,
            'image' => $product->image,
            'quantity' => $request['quantity']
        ];

        $notification = array(
            'message' => 'Item added to cart',
            'alert-type' => 'success'
        );

        Session::put('cart', $cart);
        return back()->with($notification);
    }

    public function getCart(request $request)
    {
        return view('ecommerce.cart');
    }

    public function minusQty(request $request, $id)
    {
        $cart = Session::get('cart');

        if(count($cart) == 1 && $cart[$id]['quantity'] == 1)
        {
            Session::forget('cart');
        }
        else
        {
            if($cart[$id]['quantity'] > 0)
            {
                $cart[$id]['quantity']--;
                Session::put('cart', $cart);
            }
        }

        if($cart[$id]['quantity'] == 0)
        {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return back();
    }

    public function addQty(request $request, $id)
    {
        $cart = Session::get('cart');

        $cart[$id]['quantity']++;

        Session::put('cart', $cart);
        return back();

    }

    public function removeItem(request $request, $id)
    {
        $product = Product::find($id);
        $cart = Session::get('cart');

        if(count($cart) == 1)
        {
            Session::forget('cart');
        }
        else
        {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }
        return back();
    }

    public function getCheckout()
    {
        return view('ecommerce.checkout');
    }

    public function checkout(request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
        ]);

        if(!Session::has('cart'))
        {
            return redirect('/login');
        }

        $cart = Session::get('cart');
        
        $total = 0;
        $total2 = 0;
        foreach(Session::get('cart') as $product)
        {
            $total += $product['price_min']*$product['quantity'];

            $products = Product::find($product['id']);
            $qty = $product['quantity'];
            $qty2 = $products->quantity;
            $total2 = $qty2 - $qty;

            $products->quantity = $total2;
            $products->save();
        }

        \Stripe\Stripe::setApiKey("sk_test_CVl0lLvwf3BMlf5XJt0XjE2I00O3ZkTrxA");
        
        $charge = \Stripe\Charge::create([
            'amount' => $total * 100,
            'currency' => 'PHP',
            'source' => $request->input('stripeToken'),
            'description' => 'Test Charge'
        ]);

        $order = new Order();
        $order->name = $request['name'];
        $order->cart = serialize($cart);
        $order->address = $request['address'];
        $order->payment_id = $charge->id;
        $order->total = $total;



        Auth::user()->orders()->save($order);

        $notification = array(
            'purchase' => 'You have successfully purchased products!',
        );

        Session::forget('cart');
        return redirect()->route('shop')->with($notification);
    }
}
