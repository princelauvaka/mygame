<?php

namespace App\Http\Controllers\Dash;

use App\Trole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Trole::all();
        return view('dashboard.roles.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.roles.create');
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
                'name' => 'required|max:255|unique:troles',
                'description' => 'required|max:255'
            ));



        // store in database
        $roles = new Trole;

        $roles->name        = $request->name;
        $roles->description = $request->description;

        $roles->save();

        Session::flash('success','New user "'.$request->role.'" has been added ');

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
        $role = Trole::find($id);
        return view('dashboard.roles.edit')->withRole($role);
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
        $roles = Trole::find($id);

        //if email has not changed
        $this->validate($request, array(
            'name'            => 'required|max:100|unique:troles,name,'.$id,
            'description'     => 'required|max:255'
            ));

        $roles->name           = $request->input('name');
        $roles->description    = $request->input('description');

        $roles->save();

        Session::flash('success','Roles updated');

        return redirect()->route('roles.index',$roles->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Trole::find($id);

        $role->delete();

        Session::flash('success','Role Deleted');

        return redirect()->route('roles.index');
    }
}