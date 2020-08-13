<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function addImage(request $request, $id)
    {
        $product = Product::find($id);
        $this->validate($request, [
            'imageAdd' => 'required|image|mimes:jpeg,png,jpg',
        ], [
            'imageAdd.required' => 'Product image is required',
        ]);

        $image = $request->file('imageAdd');
        $filename = time().'.'.$image->getClientOriginalName();
        $image->move('images', $filename);

        $productImage = new ProductImage();
        $productImage->image = $filename;
        $product->images()->save($productImage);

        return back();
    }

    public function deleteProductImage($id)
    {
        $productImage = ProductImage::find($id);
        
        if($productImage != null)
        {
            File::delete('images/'.$productImage->image);
            $productImage->delete();
        }
        return back();
    }

}
