<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashController extends Controller
{
    //
	public function __construct()
	{
	  $this->middleware('auth');
	}

	public function index()
	{
		return view('dashboard.index');
	}

}
