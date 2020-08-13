<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandMasterfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brands'] = Brand::paginate(10);
        return view('brand.index', $data);
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
        $this->validate($request, [
            'brand_name' => 'required',
        ]);

        $brand = new Brand;
        $brand->brand_name = $request['brand_name'];
        $brand->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */

    public function editupdate($id)
    {
        
        $data['brands'] = Brand::find($id);
        return view('brand.update', $data);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'brand_name'  => 'required',
        ]);

        $brand = Brand::find($id);
        $brand_name = $request['brand_name'];

        $brand->brand_name = $brand_name;

        $brand->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }  
}
