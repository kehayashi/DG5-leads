<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarEquipe extends Migration {

    public function up() {
        
        Schema::create('equipe', function($table){
            $table->increments('equipe_id');
            $table->string('nome', 40);
            $table->string('sobrenome', 40);
            $table->string('email', 40);
            $table->string('telefone');
            $table->string('cargo', 30);
            $table->string('senha', 60);
            $table->string('remember_toke', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        
        Schema::drop('equipe');
    }
}
