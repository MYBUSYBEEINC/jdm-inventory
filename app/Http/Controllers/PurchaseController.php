<?php

namespace App\Http\Controllers;

use DB;
use App\Supplier;
use App\Branch;
use App\Purchase;
use App\Product;
use App\Order;
use Auth;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['suppliers'] = Supplier::all();
        $data['branches'] = Branch::all();
        $data['purchases'] = Purchase::orderBy('id', 'DESC')->get();
        return view('purchase.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['suppliers'] = Supplier::all();
        $data['branches'] = Branch::all();
        $data['products'] = Product::all();
        // $data['prod'] = Product::pluck('id', 'product_name');
        return view('purchase.create', $data);
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

            'supplier_id' => 'required',
            'req_branch'  => 'required',
            'del_branch'  => 'required',
            'requested_by'=> 'required',
            
        ]);


        $lastorderId = Purchase::orderBy('id', 'desc')->first()->po_number ?? 0;
        $lastIncrement = substr($lastorderId, -3);
        // $orderStmt = Purchase::select("SHOW TABLE STATUS LIKE 'orders'");
        // $nextPrimaryKeyId = $orderStmt[0]->Auto_increment;

        // $nextPrimaryKeyId = str_pad($nextPrimaryKeyId, 6, 0);
        

        $purchase = new Purchase;
        // $purchase->po_number = $request['po_number'];
        $purchase->po_number = 'B-' . date('Ym') . str_pad($lastIncrement + 1, 4, 0, STR_PAD_LEFT);
        $purchase->po_date = date('Y-m-d H:i:s');
        $purchase->supplier_id = $request['supplier_id'];
        $purchase->req_branch = $request['req_branch'];
        $purchase->del_branch = $request['del_branch'];
        $purchase->requested_by = $request['requested_by'];
        $purchase->approved_by = $request['approved_by'];
        $purchase->status = 'Requested';

        $purchase->save();

        $order_product_id_array = $request->input('product_name');
        $order_quantity_array = $request->input('quantity');
        $order_price_min_array =  $request->input('price_min');
        $order_price_max_array = $request->input('price_max');

        for($i = 0; $i < count($order_product_id_array); $i++){
            $order = new Order;
            $order->po_number = 'B-' . date('Ym') . str_pad($lastIncrement + 1, 4, 0, STR_PAD_LEFT);
            $order->po_date = date('Y-m-d H:i:s');
            $order->product_id = $order_product_id_array[$i];
            $order->quantity = $order_quantity_array[$i];
            $order->price_min = $order_price_min_array[$i];
            $order->price_max = $order_price_max_array[$i];
            DB::table('products')->where('id', $order_product_id_array)->decrement('quantity', $order->quantity); 

            $order->save();
        }
        



        // if(Auth::user()->user_role == 1 || Auth::user()->user_role == 2){
        //     $purchase->status = 'Requested';
        // }
        // else
        // {
        //     $purchase->status = 'Unknown';
        // }
        // $purchase->save();
        $data['suppliers'] = Supplier::all();
        $data['branches'] = Branch::all();
        $data['purchases'] = Purchase::orderBy('id', 'DESC')->get();
        return view('purchase.index', $data);




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Purchase::with('supplier', 'reqbranch', 'delbranch', 'product')->find($id);
        return view('purchase.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function showedit($id)
    {
        $prod['products'] = Product::all();
        $data = Purchase::with('supplier', 'reqbranch', 'delbranch', 'product')->find($id);
        return view('purchase.edit', compact('data'),$prod);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [

            'supplier_id' => 'required',
            'req_branch'  => 'required',
            'del_branch'  => 'required',
            'requested_by'=> 'required',
            
        ]);
        
        $po_number = $request->input('po_number');
        
        $order_quantity_old = $request->input('quantity_old');
        $order_product_id_array = $request->input('product_name');
        $order_quantity_array = $request->input('quantity');
        $order_price_min_array =  $request->input('price_min');
        $order_price_max_array = $request->input('price_max');
        

        $form_data = array(
            'supplier_id'   => $request->supplier_id,
            'req_branch'    => $request->req_branch,
            'del_branch'    => $request->del_branch

        ); 

        Purchase::whereId($po_number)->update($form_data);
        
        for($i = 0; $i < count($order_product_id_array); $i++){

            
            $form_order = array(
                'product_id'   => $order->product_id = $order_product_id_array[$i],
                'quantity'    => $order->quantity = $order_quantity_array[$i]    
            );

            $order->quantity_old = $order_quantity_old[$i];
            $order->quantity = $order_quantity_array[$i];

            Order::where('po_number', $po_number)->where('product_id', $order_product_id_array[$i])->update($form_order);

            DB::table('products')->where('id', $order_product_id_array[$i])->increment('quantity', $order->quantity_old);
            DB::table('products')->where('id', $order_product_id_array[$i])->decrement('quantity', $order->quantity);
        }

        
        $data['suppliers'] = Supplier::all();
        $data['branches'] = Branch::all();
        $data['purchases'] = Purchase::orderBy('id', 'DESC')->get();
        return view('purchase.index', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
