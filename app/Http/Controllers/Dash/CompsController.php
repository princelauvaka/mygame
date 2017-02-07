<?php

namespace App\Http\Controllers\Dash;

use App\Tcomp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.comps.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.comps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $this->validate($request, array(
                'name'      => 'required|max:255|unique:tcomps',
                'country'   => 'required|max:255',
                'city'      => 'required|max:255',
                'suburb'    => 'required|max:255',
                'logo'      => 'required|mimes:jpeg,png'
            ));

        // store in database
        $comps = new Tcomp;

        $comps->name = $request->name;
        $comps->country = $request->country;
        $comps->city = $request->city;
        $comps->suburb = $request->suburb;
        $comps->logo = $request->logo;

        $comps->save();

        Session::flash('success','New user "'.$request->name.'" has been added ');

        // redirect to another page
        return redirect()->route('roles.index');
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
    public function update(Request $request, $id)
    {
        //
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
