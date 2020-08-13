<?php

namespace App\Http\Controllers;

use App\Product;
use App\Pricing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricings = Pricing::orderBy('id', 'DESC')->get();
        return view('pricing.index', compact('pricings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'product_name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'margin_pct' => 'required',
            'fdate' => 'required'
            
        ]);

        date_default_timezone_set('Asia/Manila');

        $price = $request['price'];
        $margin = $request['margin_pct'];
        $lpp = $price;
    
        $margin_amt = ($margin / 100) * $price;
        $reg_price = $price + $margin_amt;

        $cash_price = ($price * .02) + $price;

        
        $fdate = $request['fdate'];
        $tdate = Carbon::now();
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        

        $pricing = new Pricing;

        $pricing->ave_age = $days;
        $pricing->quantity = $request['quantity'];
        $pricing->lpp = $lpp;
        $pricing->ave_price = $price;
        $pricing->margin_percent = $request['margin_pct'];
        $pricing->margin_amt = $margin_amt;
        $pricing->cash_price = $cash_price;
        $pricing->reg_selling_price = $reg_price;
        $pricing->product_name = $request['product_name'];

        $pricing->save();
        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function show(Pricing $pricing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pricings'] = Pricing::find($id);
        return view('pricing.update', $data);
    }

    public function destroy(Pricing $pricing)
    {
        //
    }

    public function editupdate($id)
    {
        
        $data['pricings'] = Pricing::find($id);
        return view('pricing.update', $data);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'product_id' => 'required',
            'price'  => 'required',
            'quantity' => 'required',
            'fdate' => 'required'
        ]);

        $pricing = Pricing::find($id);
        $quantity = $request['quantity'];
        $price = $request['price'];

        $quantitybefore = $pricing->quantity;
        $quantitytotal = $quantity + $quantitybefore;

        $pricebefore = $pricing->lpp;
        $priceaverage = ($price + $pricebefore) / 2;

        $ave_age = $pricing->ave_age;
        $fdate = $request['fdate'];
        $tdate = Carbon::now();
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        $final_age = ($ave_age + $days) / 2;

        $pricing->ave_age = $final_age;
        $pricing->quantity = $quantitytotal;
        $pricing->lpp = $request['price'];
        $pricing->ave_price = $priceaverage;

        $pricing->save();

        return back();
    }

    public function editpercent($id)
    {
        
        $data['pricings'] = Pricing::find($id);
        return view('pricing.updatepercent', $data);
    }

    public function updatepercent(Request $request, $id)
    {
        
        $this->validate($request, [
            'product_id' => 'required',
            'percent' => 'required'
        ]);

        $pricing = Pricing::find($id);
        
        $percent = $request['percent'];
        $ave_price = $pricing->ave_price;

        $margin_amt = ($percent / 100) * $ave_price;

        $lpp = $pricing->lpp;

        $reg_price = $margin_amt + $lpp;
        

        
        $pricing->margin_percent = $percent;
        $pricing->margin_amt = $margin_amt;
        $pricing->reg_selling_price = $reg_price;

        $pricing->save();

        return back();
    }
}