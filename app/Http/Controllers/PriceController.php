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
use App\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['prices'] = Product::paginate(15);
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
        $data['subcategories'] = Subcategory::all();
        $data['classifications'] = Classification::all();
        $data['colors'] = Color::all();
        $data['units'] = Unit::all();
        return view('price.index', $data);
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
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
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
                        <td>'.$row->quantity.'</td>
                        <td>'.$row->price_min.'</td>
                        <td>'.$row->price_max.'</td>
                        <td class="text-right">
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                    <span>
                                        <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#addStockModal-'.$row->id.'"><i class="fas fa-sync-alt"></i></button>
                                    </span>
                                    </button>
                                    </div>
                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                    <span>
                                        <button type="button" class="btn-sm btn-warning" data-toggle="modal" data-target="#addStockModal-'.$row->id.'"><i class="fa fa-eye"></i></button>
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
    public function editupdateprice($id)
    {
        
        $data['products'] = Product::find($id);
        return view('product.update', $data);
    }

    public function updateprice(Request $request, $id)
    {
        
        $this->validate($request, [
            'price_min',
            'price_max'
        ]);

        $price = Product::find($id);
        $price_min = $request['price_min'];
        $price_max = $request['price_max'];

        if($price_min == null){

            $price->price_max = $price_max;
    
            $price->save();

        }
        elseif($price_max == null){

            $price->price_min = $price_min;

            $price->save();

        }
        else{

            $price->price_min = $price_min;
            $price->price_max = $price_max;

            $price->save();
        }
        return back();
    }
}
