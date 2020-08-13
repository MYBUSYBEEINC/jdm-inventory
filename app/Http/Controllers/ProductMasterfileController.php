<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\Brand;
use App\Category;
use App\Classification;
use App\Color;
use App\Unit;
use App\Subcategory;
use App\SubSubCategory;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductMasterfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::paginate(4);
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
        $data['subcategories'] = Subcategory::all();
        $data['subsubcategories'] = SubSubCategory::all();
        $data['classifications'] = Classification::all();
        $data['colors'] = Color::all();
        $data['units'] = Unit::all();
        return view('product.index', $data);
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
     * Search the data
     * 
     * 
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $products['products'] = Product::where('product_name', 'like', '%'.$search.'%')->orWhere('product_code', 'like', '%'.$search.'%')->paginate(5);
        $products['brands'] = Brand::all();
        $products['categories'] = Category::all();
        $products['classifications'] = Classification::all();
        $products['colors'] = Color::all();
        $products['units'] = Unit::all();
        $products['subcategories'] = Subcategory::all();
        $products['subsubcategories'] = SubSubCategory::all();
        return view('product.index', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'brand_id' => 'required',
            'sub_category' => 'required',
            'color_id' => 'required',
            'classification_id' => 'required',
            'unit_id' => 'required',
            'subsubcategory_id' => ' required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'length' => 'required',
            'width' => 'required',
            'weight' => 'required',
            'scale' => 'required',
            'height' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'price_min' => 'required',
            'price_max' => 'required'

            
        ]);

        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalName();
        $image->move('images', $filename);

        $products = new Product;
        $products->category_id = $request['category_id'];
        $products->brand_id = $request['brand_id'];
        $products->sub_category_id = $request['sub_category'];
        $products->color_id = $request['color_id'];
        $products->classification_id = $request['classification_id'];
        $products->unit_id = $request['unit_id'];
        $products->subsubcategory_id = $request['subsubcategory_id'];
        $products->product_code = $request['product_code'];
        $products->quantity = $request['product_qty'];
        $products->product_name = $request['product_name'];
        $products->description = $request['description'];
        $products->length = $request['length'];
        $products->width = $request['width'];
        $products->weight = $request['weight'];
        $products->scale = $request['scale'];
        $products->height = $request['height'];
        $products->image = $filename;
        $products->price_min = $request['price_min'];
        $products->price_max = $request['price_max'];

        $products->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::with('category', 'brand', 'classification', 'color', 'unit', 'subcategory')->find($id);
        return view('product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    public function getProduct($id)
    {
        $units = Unit::all();
        $classifications = Classification::all();
        $colors = Color::all();
        $subsubcategories = SubSubcategory::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $categories = Category::all();
        $productImages = ProductImage::where('product_id', $id)->latest()->get();
        $product = Product::find($id);
        return view('product.edit', compact('product', 'productImages', 'categories', 'subcategories', 'subsubcategories', 'brands', 'colors', 'classifications', 'unit'));
    }

    public function editProduct(request $request, $id)
    {
        $product = Product::find($id);
        
        if($request->hasFile('imageEdit'))
        {
            $this->validate($request, [
                'category_id' => 'required',
                'brand_id'  => 'required',
                'subcategory_id'  => 'required',
                'subsubcategory_id' => 'required',
                'color_id',
                'classification_id'  => 'required',
                'unit_id'  => 'required',
                'product_code'  => 'required',
                'product_qty'  => 'required',
                'product_name'  => 'required',
                'description',
                'length'  => 'required',
                'width'  => 'required',
                'weight'  => 'required',
                'height'  => 'required',
                'price_min'  => 'required',
                'price_max'  => 'required',
                'imageEdit' => 'required|image|mimes:jpeg,png,jpg',
            ]);

            $image = $request->file('imageEdit');
            $filename = time().'.'.$image->getClientOriginalName();
            $image->move('images', $filename);

            $product->category_id = $request['category_id'];
            $product->brand_id = $request['brand_id'];
            $product->sub_category_id = $request['subcategory_id'];
            $product->subsubcategory_id = $request['subsubcategory_id'];
            $product->color_id = $request['color_id'];
            $product->classification_id = $request['classification_id'];
            $product->unit_id = $request['unit_id'];
            $product->product_code = $request['product_code'];
            $product->quantity = $request['product_qty'];
            $product->product_name = $request['product_name'];
            $product->description = $request['description'];
            $product->length = $request['length'];
            $product->width = $request['width'];
            $product->weight = $request['weight'];
            $product->height = $request['height'];
            $product->price_min = $request['price_min'];
            $product->price_max = $request['price_max'];
            $product->image = $filename;

            $product->save();
        }
        else{
            $this->validate($request, [
                'category_id' => 'required',
                'brand_id'  => 'required',
                'subcategory_id'  => 'required',
                'color_id',
                'classification_id'  => 'required',
                'subsubcategory_id' => 'required',
                'unit_id'  => 'required',
                'product_code'  => 'required',
                'product_qty'  => 'required',
                'product_name'  => 'required',
                'description',
                'length'  => 'required',
                'width'  => 'required',
                'weight'  => 'required',
                'height'  => 'required',
                'price_min'  => 'required',
                'price_max'  => 'required',
            ]);

            $product->category_id = $request['category_id'];
            $product->brand_id = $request['brand_id'];
            $product->sub_category_id = $request['subcategory_id'];
            $product->subsubcategory_id = $request['subsubcategory_id'];
            $product->color_id = $request['color_id'];
            $product->classification_id = $request['classification_id'];
            $product->unit_id = $request['unit_id'];
            $product->product_code = $request['product_code'];
            $product->quantity = $request['product_qty'];
            $product->product_name = $request['product_name'];
            $product->description = $request['description'];
            $product->length = $request['length'];
            $product->width = $request['width'];
            $product->weight = $request['weight'];
            $product->height = $request['height'];
            $product->price_min = $request['price_min'];
            $product->price_max = $request['price_max'];

            $product->save();
        }

        return back();
    }

    public function editupdatequantity($id)
    {
        
        $data['products'] = Product::find($id);
        return view('product.update', $data);
    }

    public function updatequantity(Request $request, $id)
    {
        
        $this->validate($request, [
            'product_qty' => 'required',
        ]);

        $product = Product::find($id);
        $qty = $request['product_qty'];

        $qty1 = $product->quantity;

        $total = $qty1 + $qty;
        
        $product->quantity = $total;

        $product->save();

        return back();
    }

    public function editupdateproduct($id)
    {
        $data['products'] = Product::find($id);
        return view('product.update', $data);
    }

    public function updateproduct(Request $request, $id)
    {
        
        $this->validate($request, [
            'category_id' => 'required',
            'brand_id'  => 'required',
            'sub_category'  => 'required',
            'subsub_category' => 'required',
            'color_id',
            'classification_id'  => 'required',
            'unit_id'  => 'required',
            'product_code'  => 'required',
            'product_qty'  => 'required',
            'product_name'  => 'required',
            'description',
            'length'  => 'required',
            'width'  => 'required',
            'weight'  => 'required',
            'height'  => 'required',
            'price_min'  => 'required',
            'price_max'  => 'required'
        ]);

        $product = Product::find($id);
        $category = $request['category_id'];
        $brand = $request['brand_id'];
        $sub_category = $request['sub_category'];
        $subsub_category = $request['subsub_category'];
        $color = $request['color_id'];
        $classification = $request['classification_id'];
        $unit = $request['unit_id'];
        $product_code = $request['product_code'];
        $product_qty = $request['product_qty'];
        $product_name = $request['product_name'];
        $description = $request['description'];
        $length = $request['length'];
        $width = $request['width'];
        $weight = $request['weight'];
        $height = $request['height'];
        $price_min = $request['price_min'];
        $price_max = $request['price_max'];


        $product->category_id = $category;
        $product->brand_id = $brand;
        $product->sub_category_id = $sub_category;
        $product->subsubcategory_id = $subsub_category;
        $product->color_id = $color;
        $product->classification_id = $classification;
        $product->unit_id = $unit;
        $product->product_code = $product_code;
        $product->quantity = $product_qty;
        $product->product_name = $product_name;
        $product->description = $description;
        $product->length = $length;
        $product->width = $width;
        $product->weight = $weight;
        $product->height = $height;
        $product->price_min = $price_min;
        $product->price_max = $price_max;

        $product->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    function action(Request $request)
    {   
        $output = null;
        if($request->ajax())
        {
            
            $query = $request->get('query');
            if($query != '')
            {
                $sql = Brand::all();
                $sql = Product::where('product_name', 'like', '%'.$query.'%')
                            ->orWhere('product_code', 'like', '%'.$query.'%')
                            ->get();
            }
            else
            {
                $sql = Product::all()->sortBy('id');
            }
            $total_row = count($sql);
            if($total_row > 0)
            {
                foreach($sql as $row)
                {
                    $output .= '
                    <tr>
                        <td class="font-weight-bold">'.$row->product_code.'</td>.
                        <td>'.$row->product_name.'</td>
                        <td>'.$row->brand->brand_name.'</td>
                        <td>'.$row->category->category_name.'</td>
                        <td>'.$row->classification->classification_name.'</td>
                        <td>'.$row->color->color_name.'</td>
                        <td>'.$row->unit->unit_name.'</td>
                        <td>'.$row->quantity.'</td>
                        <td>'.$row->price_min.'</td>
                        <td>'.$row->price_max.'</td>
                        <td style="white-space: nowrap; width:50px; height: 30px; overflow: scroll;">'.$row->description.'</td>
                        <td class="text-right">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-shrink-1 bd-highlight">
                                <span>
                                    <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#addStockModal-'.$row->id.'"><i class="fas fa-plus"></i></button>
                                </span>
                                </button>
                                </div>
                                <div class="p-2 flex-shrink-1 bd-highlight">
                                <span>
                                    <a class="btn btn-dark btn-sm" href="{{route('.editProduct.', $row->id)}}"><i class="fas fa-edit"></i></a>&nbsp;
                                </span>
                                </div>
                                <div class="p-2 flex-shrink-1 bd-highlight">
                                    <a href="#" data-name="" data-href="" class="btn btn-danger btn-sm deleteEmp" data-toggle="modal" data-target="#deleteModalCenter"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    ';
                }
            }
            else
            {
                $output .= '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
                
            }
            $data['table_data']        =  $output;
            $data['total_data']        =  $total_row;

            echo json_encode($data);
        }
    }
}
