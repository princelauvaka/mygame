<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Trole;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles       = Trole::all();
        return view('dashboard.users.create')->withRoles($roles);
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
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed'
            ));

        // store in database
        $user = new User;

        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = bcrypt($request->password);

        $user->save();

        $user->roles()->sync($request->roles, false);

        Session::flash('success','New user "'.$request->name.'" has been added ');

        // redirect to another page
        return redirect('dash');
        // return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user   = User::find($id);

        $roles   = Trole::all();
        $rolez  = array();

        foreach($roles as $role){
            $rolez[$role->id] = $role->name;
        }

        return view('dashboard.users.edit')->withUser($user)->withRolez($rolez);
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
        $user = User::find($id);

        //if email has not changed
        $this->validate($request, array(
            'name'      => 'required|max:100',
            'email'     => 'required|email|max:255|unique:users,email,'.$id
            ));

        $user->name     = $request->input('name');
        $user->email    = $request->input('email');

        $user->save();

        if(isset($request->roles)){
            $user->roles()->sync($request->roles);
        }else{
            $user->roles()->sync(array());
        }


        Session::flash('success','User updated');

        return redirect()->route('users.show',$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Session::flash('success','User Deleted');

        return redirect()->route('users.index');
    }
}
