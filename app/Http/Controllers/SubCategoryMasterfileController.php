<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubCategoryMasterfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subcategories'] = Subcategory::all();
        $data['categories'] = Category::all();
        return view('subcategory.index', $data);
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
            'category_id'           => 'required',
            'subcategory_code'      => 'required',
            'subcategory_name'      => 'required',
        ]);

        $subcategory = new Subcategory;
        $subcategory->category_id = $request['category_id'];
        $subcategory->subcategory_code = $request['subcategory_code'];
        $subcategory->subcategory_name = $request['subcategory_name'];
        $subcategory->save();

        return back();
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
    public function editupdate($id)
    {
        
        $data['subcategories'] = Subcategory::find($id);
        return view('subcategory.update', $data);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'subcategory_code'  => 'required',
            'subcategory_name'  => 'required'
        ]);

        $subcategory = Subcategory::find($id);
        $subcategory_code = $request['subcategory_code'];
        $subcategory_name = $request['subcategory_name'];

        $subcategory->subcategory_code = $subcategory_code;
        $subcategory->subcategory_name = $subcategory_name;
    
        $subcategory->save();

        return back();
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
}
