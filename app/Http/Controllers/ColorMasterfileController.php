<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;

class ColorMasterfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['colors'] = Color::paginate(10);
        return view('color.index', $data);
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
            'color_name' => 'required',
        ]);

        $color = new Color;
        $color->color_name = $request['color_name'];
        $color->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */

    public function editupdate($id)
    {
        
        $data['colors'] = Color::find($id);
        return view('color.update', $data);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'color_id'  => 'required',
            'color_name'  => 'required'
        ]);

        $color = Color::find($id);
        $color = $request['color_name'];


        $color->unit_name = $unit_name;

        $unit->save();

        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        //
    }
}
