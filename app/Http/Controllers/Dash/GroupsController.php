<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Tcomp;
use App\Tgroup;
use App\User;
use Session;

class GroupsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Tgroup::all();
        return view('dashboard.groups.index')->withGroups($groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uuid = $this->gen_uuid();
        return view('dashboard.groups.create')->withUid($uuid);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'name'          => 'required|max:255|unique:tgroups',
            'searchcomps'   => 'required|max:255|exists:tcomps,name',
            'compid'        => 'required|max:3|exists:tcomps,id'
            ));

        $group =  new Tgroup;
        
        $group->name            = $request->name;
        $group->comp_id         = $request->compid; //get id not name
        $group->captain_id      = Auth::user()->id;
        $group->code            = $this->gen_uuid();

        $group->save();

        Session::flash('success','New Group "'.$request->name.'" has been added ');

        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Tgroup::find($id);
        return view('dashboard.groups.show')->withGroup($group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $users  = User::all();
        $userz  = array();

        foreach($users as $user){

            $userz[$user->id] = $user->name;

        }

        $group = Tgroup::find($id);

        return view('dashboard.groups.edit')->withGroup($group)->withUserz($userz);

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

    private function gen_uuid($len=5) {
        
        $salt   = uniqid(mt_rand(), true);
        $hex    = md5($salt . uniqid("", true));

        $pack   = pack('H*', $hex);
        $tmp    =  base64_encode($pack);

        $uid    = preg_replace("#(*UTF8)[^A-Za-z0-9]#", "", $tmp);

        $len    = max(4, min(128, $len));

        while (strlen($uid) < $len)
            $uid .= gen_uuid(22);

        return substr($uid, 0, $len);
    }

    public function autocomplete(Request $request)
    {
        $term = $request->term; //jquery
        $data = Tcomp::where('name','LIKE','%'.$term.'%')
        ->take(3)
        ->get();

        $results = array();
        foreach ($data as $key => $v){
            $results[] = ['id'=>$v->id,'value'=>$v->name];
        }
        
        return response()->json($results);
        // return 'testing';
    }
}
