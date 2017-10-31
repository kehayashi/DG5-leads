<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EquipeController;
use Request;
use Auth;
use App\Equipe;
use App\Meta;
use App\Http\Requests\EquipeRequest;
use App\Http\Requests\ResetSenhaRequest;
use DB;
use Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EMail;
use Session;

Class EquipeController extends Controller {

	public function novoPreVendedor(){

		return view('form_cadastro_equipe');
	}

	public function lista(){
		$equipe = Equipe::all();

		return view('lista_equipe')
					->with('equipe', $equipe);
	}

	public function cadastraEquipe(EquipeRequest $request){
		$date = $request->daterange;
		$datas = explode("-", $date);
		//echo $datas[0]; // dataInicio
		//echo $datas[1]; // dataFim

		$caracteres = "0123456789abcdefghijklmnopqrstuvwxyz";
		$senhaAleatoria = substr(str_shuffle($caracteres),0,10);

		DB::beginTransaction();

		$equipe = new Equipe();
		$equipe->nome = $request->nome;
		$equipe->sobrenome = $request->sobrenome;
		$equipe->email = $request->email;
		$equipe->telefone = $request->telefone;
		$equipe->cargo = $request->cargo;

		Mail::send('template_email_senha', ['senhaAleatoria' => $senhaAleatoria, 'equipe' => $equipe], function ($m) use ($equipe){
			 $m->from('kendyhayashi@gmail.com');
			 $m->to($equipe->email)->subject('Cadastro DG5');
			});

		$equipe->senha = Hash::make($senhaAleatoria);
		$equipe->save();
		$equipe = Equipe::all();

		$meta = new Meta();
		$meta->equipe_id = $equipe->last()->equipe_id;
		$valorMeta = strtr($request->meta, array(',' => '', '.' => ''));
		$meta->meta = $valorMeta;
		$meta->data_inicio = $datas[0];
		$meta->data_fim = $datas[1];
		$meta->save();

		DB::commit();

		return redirect('/equipe')
					->withInput();
	}

	public function deletaEquipe($equipe_id){
		$equipe_id = REQUEST::route('equipe_id');
    $equipe = Equipe::find($equipe_id);
    $equipe->delete();
    $equipe = Equipe::all();
    $deletado = true;

		return view('lista_equipe')
					->with('equipe', $equipe)
					->with('deletado', $deletado);
	}

	public function membroEquipeAtualizar($equipe_id){
		$equipe_id = REQUEST::route('equipe_id');
    $equipe = Equipe::find($equipe_id);

    return view('form_atualiza_equipe')
					->with('e', $equipe);
	}

	public function atualizaEquipe(EquipeRequest $request){
	 	$equipe = Equipe::find($request->equipe_id);
		$equipe->nome = $request->nome;
		$equipe->sobrenome = $request->sobrenome;
		$equipe->email = $request->email;
		$equipe->telefone = $request->telefone;
		$equipe->meta = $request->meta;
		$equipe->cargo = $request->cargo;
		$equipe->senha = $request->senha;
		$equipe->save();
		$equipe = Equipe::all();
		$atualizado = true;

		return view('lista_equipe')
					->with('equipe', $equipe)
					->with('atualizado', $atualizado);
	}

	public function formRedefinirSenha(){

		return view('form_reset_password');

	}

	public function redefinirSenha(ResetSenhaRequest $request){

		$novaSenhaHash = Hash::make($request->novaSenha2);

		if(Auth::attempt(['email' => $request->email, 'password' => $request->senhaAleatoria])) {

			$equipe = Equipe::find(Auth::user()->equipe_id);
			$equipe->senha = $novaSenhaHash;
			$equipe->save();

			return redirect('/');
    }
    else{
      $erro = false;

			return view('form_reset_password')
						->with('erro', $erro);
    }

	}

}
