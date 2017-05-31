<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Rede_socialController;
use Request;
use Auth;
use App\Rede_social;
use App\Http\Requests\Rede_socialRequest;

Class Rede_socialController extends Controller {

	public function cadastraRede_Social(Rede_socialRequest $request){
		Rede_social::create($request->all());
		//$cadastrado = true;
		return redirect('/lead');
	}

}
