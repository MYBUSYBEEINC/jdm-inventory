<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class BranchMasterFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['branches'] = Branch::paginate(10);
        return view('branch.index', $data);
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
            'branch_name' => 'required',
            'address'     => 'required',
        ]);

        $branch = new Branch;
        $branch->branch_name = $request['branch_name'];
        $branch->address     = $request['address'];
        $branch->save();

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
        
        $data['branches'] = Branch::find($id);
        return view('branch.update', $data);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'branch_name'  => 'required',
            'address'  => 'required'
        ]);

        $branch = Branch::find($id);
        $branch_name = $request['branch_name'];
        $address = $request['address'];

        $branch->branch_name = $branch_name;
        $branch->address = $address;
    
        $branch->save();

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
