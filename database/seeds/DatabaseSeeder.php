<?php

use Illuminate\Database\Seeder;
use App\Equipe;

class DatabaseSeeder extends Seeder {
    
    public function run() {

         $this->call('TabelaEquipeSeeder');
    }

}

class TabelaEquipeSeeder extends Seeder {
 
    public function run() {

        $usuarios = Equipe::get();
 
        if($usuarios->count() == 0) {
            Equipe::create(array(
                'nome'  => 'kendy',
                'sobrenome' => 'hayashi',
                'email' => 'kehayashi@hotmail.com',
                'telefone' => '055991648900',
                'cargo'  => 'diretor',
                'senha' => Hash::make('12345')
            ));
        }
    }
 
}
