<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\SubSubCategory;

class SubSubCategoryMasterfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subsubcategories'] = SubSubCategory::all();
        $data['subcategories'] = Subcategory::all();
        return view('subsubcategory.index', $data);
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
            'subcategory_id'           => 'required',
            'subsubcategory_code'      => 'required',
            'subsubcategory_name'      => 'required',
        ]);

        $subsubcategory = new SubSubCategory;
        $subsubcategory->subcategory_id = $request['subcategory_id'];
        $subsubcategory->subsubcategory_code = $request['subsubcategory_code'];
        $subsubcategory->subsubcategory_name = $request['subsubcategory_name'];
        $subsubcategory->save();

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
        
        $data['subsubcategories'] = SubSubCategory::find($id);
        return view('subsubcategory.update', $data);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'subsubcategory_code'  => 'required',
            'subsubcategory_name'  => 'required'
        ]);

        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory_code = $request['subsubcategory_code'];
        $subsubcategory_name = $request['subsubcategory_name'];

        $subsubcategory->subsubcategory_code = $subsubcategory_code;
        $subsubcategory->subsubcategory_name = $subsubcategory_name;
    
        $subsubcategory->save();

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
