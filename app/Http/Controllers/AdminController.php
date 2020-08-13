<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Order;
use App\ProductAttribute;
use App\ProductImage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users['users'] = User::where('is_admin', 0)->latest()->get();
        return view('admin.users', $users);
    }

    public function products()
    {
        $products['products'] = Product::latest()->paginate(3);
        return view('admin.products', $products);
    }

    public function orders()
    {
        $orders['orders'] = Order::latest()->get();
        return view('admin.orders', $orders);
    }

    public function orderStatus(request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request['status'];
        $order->save();

        $notif = array(
            'message' => 'Order Updated',
            'alert-type' => 'success'
        );
        return back()->with($notif);
    }

    public function addProduct(request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'price' => 'required|numeric',
            'size.*' => 'required',
            'stock.*' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ], [
            'title.required' => 'Product name is required',
            'desc.required' => 'Product description is required',
            'price.required' => 'Product price is required',
            'size.*.required' => 'Product size is required',
            'stock.*.required' => 'Product stock is required',
            'image.required' => 'Product image is required',
        ]);

        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalName();
        $image->move('images', $filename);

        $product = new Product();
        $product->title = $request['title'];
        $product->desc = $request['desc'];
        $product->price = $request['price'];
        $product->image = $filename;
        $product->save();
        
        foreach($request['size'] as $key => $val)
        {
            $attribute = new ProductAttribute();
            $attribute->size = $request['size'][$key];
            $attribute->stock = $request['stock'][$key];
            $product->attributes()->save($attribute);
        }

        $notification = array(
            'message' => 'Product Added',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function getProduct($id)
    {
        $productImages = ProductImage::where('product_id', $id)->latest()->get();
        $product = Product::find($id);
        return view('admin.editproduct', compact('product', 'productImages'));
    }

    public function editProduct(request $request, $id)
    {
        $product = Product::find($id);
        
        if($request->hasFile('imageEdit'))
        {
            $this->validate($request, [
                'title' => 'required',
                'desc' => 'required',
                'price' => 'required|numeric',
                'size.*' => 'required',
                'stock.*' => 'required',
                'imageEdit' => 'required|image|mimes:jpeg,png,jpg',
            ], [
                'title.required' => 'Product name is required',
                'desc.required' => 'Product description is required',
                'price.required' => 'Product price is required',
                'size.*.required' => 'Product size is required',
                'stock.*.required' => 'Product stock is required',
                'imageEdit.required' => 'Product image is required',
            ]);

            $image = $request->file('imageEdit');
            $filename = time().'.'.$image->getClientOriginalName();
            $image->move('images', $filename);

            $product->title = $request['title'];
            $product->desc = $request['desc'];
            $product->price = $request['price'];
            $product->image = $filename;
            $product->save();
        }
        else
        {
            $this->validate($request, [
                'title' => 'required',
                'desc' => 'required',
                'price' => 'required|numeric',
                'size.*' => 'required',
                'stock.*' => 'required',
            ], [
                'title.required' => 'Product name is required',
                'desc.required' => 'Product description is required',
                'price.required' => 'Product price is required',
                'size.*.required' => 'Product size is required',
                'stock.*.required' => 'Product stock is required',
            ]);
            $product->title = $request['title'];
            $product->desc = $request['desc'];
            $product->price = $request['price'];
            $product->save();
        }

        $notification = array(
            'message' => 'Product edited',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if($product !=null)
        {
            $product->delete();
        }

        $notification = array(
            'message' => 'Product Deleted',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    
}
