<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Classification;
use Illuminate\Http\Request;

class ClassificationMasterfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['classifications'] = Classification::paginate(10);
        $data['subcategories']   = Subcategory::all();
        return view('classification.index', $data);
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
            'classification_code' => 'required',
            'classification_name' => 'required',
            'subcategory_id'      => 'required',
        ]);

        $classification = new Classification;
        $classification->classification_code = $request['classification_code'];
        $classification->classification_name = $request['classification_name'];
        $classification->subcategory_id      = $request['subcategory_id'];
        $classification->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function show(Classification $classification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function edit(Classification $classification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function editupdate($id)
    {
        
        $data['classifications'] = Classification::with('subcategory')->find($id);
        return view('classification.update', $data);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'class_code',
            'class_name',
            'subcategory_id'
        ]);

        $qwertyy = Classification::find($id);
        
        $class_code = $request['class_code'];
        $class_name = $request['class_name'];
        $subcategory_id = $request['subcategory_id'];
        
        $qwertyy->classification_code = $class_code;
        $qwertyy->classification_name = $class_name;
        $qwertyy->subcategory_id = $subcategory_id;

        $qwertyy->save();
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classification $classification)
    {
        //
    }
}
