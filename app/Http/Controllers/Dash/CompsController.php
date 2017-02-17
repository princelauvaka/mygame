<?php

namespace App\Http\Controllers\Dash;

use App\Tcomp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Image;
use Storage;
use File;

class CompsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comps = Tcomp::all();
        return view('dashboard.comps.index')->withComps($comps);
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

        $comps->name        = $request->name;
        $comps->country     = $request->country;
        $comps->city        = $request->city;
        $comps->suburb      = $request->suburb;
        
        //save our image
        if ($request->hasFile('logo')){

            $image = $request->file('logo');
            $filename = time() . '.' .$image->getClientOriginalExtension();
            $location = public_path('assets/img/logos/'. $filename);

            // Save file in folder and resize image
            // Resize width and auto height
            // http://image.intervention.io/api/resize
            Image::make($image)->resize(600,null,function($constraint){
                 $constraint->aspectRatio();
            })->save($location);

            // Save file in database
            $comps->logo = $filename;
        }

        $comps->save();

        Session::flash('success','New Competition "'.$request->name.'" has been added ');

        // redirect to another page
        return redirect()->route('comps.index');
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
        $comp = Tcomp::find($id);
        return view('dashboard.comps.edit')->withComp($comp);
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
        $comps = Tcomp::find($id);
        // validate data
        $this->validate($request, array(
                'name'      => 'required|max:255|unique:tcomps,name',
                'country'   => 'required|max:255',
                'city'      => 'required|max:255',
                'suburb'    => 'required|max:255',
                'logo'      => 'sometimes|mimes:jpeg,png'
            ));


        $comps->name        = $request->name;
        $comps->country     = $request->country;
        $comps->city        = $request->city;
        $comps->suburb      = $request->suburb;
        
        // add the new photo
        // update the database
        // delete the old file
        if ($request->hasFile('logo')){

            $image = $request->file('logo');
            $filename = time() . '.' .$image->getClientOriginalExtension();
            $location = public_path('assets/img/logos/'. $filename);

            // Save file in folder and resize image
            // Resize width and auto height
            // http://image.intervention.io/api/resize
            Image::make($image)->resize(600,null,function($constraint){
                 $constraint->aspectRatio();
            })->save($location);

            $oldfilename = $comps->logo;

            // delete the old file
            File::delete(public_path('assets/img/logos/'. $oldfilename));

            // Save file in database
            $comps->logo = $filename;


        }

        $comps->save();

        Session::flash('success','New Competition "'.$request->name.'" has been added ');

        // redirect to another page
        return redirect()->route('comps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comps = Tcomp::find($id);

        $comps->delete();

        Session::flash('success' , 'Competition Deleted');

        return redirect()->route('comps.index');
    }
}
