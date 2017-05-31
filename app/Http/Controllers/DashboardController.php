<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DashboardController;
use Request;
use Auth;
use DB;
use App\lead;

Class DashboardController extends Controller {

	public function info(){

		$lead = new Lead();
		$lead = Lead::all();

		return view('dashboard')->with('lead', $lead);
	}

}
