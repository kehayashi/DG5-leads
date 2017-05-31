<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LoginController;
use Request;
use Auth;
use App\Equipe;
use Session;
use DB;

Class LoginController extends Controller {


	public function form(){
		return view('form_login');
	}

	public function logar(){
    $email = Request::input('email');
		$senha = Request::input('senha');

		if(Auth::attempt(['email' => $email, 'password' => $senha])) {
			Session_start();
			$equipe = Auth::User();
			Session::put('id', $equipe->equipe_id);
			Session::put('nome', $equipe->nome);
			Session::put('sobrenome', $equipe->sobrenome);
			Session::put('email', $equipe->email);

			return view('dashboard');
    }
    else{
      $erro = false;

			return view('form_login')
						->with('erro', $erro);
    }

	}

	public function logout(){
		Auth::logout();
		Session::flush();
		return redirect('/');
	}

}
