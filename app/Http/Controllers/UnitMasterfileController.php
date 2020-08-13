<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitMasterfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['units'] = Unit::paginate(10);
        return view('unit.index', $data);
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
            'unit_code' => 'required',
            'unit_name' => 'required',
        ]);

        $unit = new Unit;
        $unit->unit_code = $request['unit_code'];
        $unit->unit_name = $request['unit_name'];
        $unit->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function editupdate($id)
    {
        
        $data['units'] = Unit::find($id);
        return view('unit.update', $data);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'unit_code'  => 'required',
            'unit_name'  => 'required'
        ]);

        $unit = Unit::find($id);
        $unit_code  = $request['unit_code'];
        $unit_name = $request['unit_name'];


        $unit->unit_code = $unit_code;
        $unit->unit_name = $unit_name;

        $unit->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
