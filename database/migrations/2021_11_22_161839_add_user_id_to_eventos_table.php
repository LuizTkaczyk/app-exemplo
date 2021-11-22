<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eventos', function (Blueprint $table) {
            // insere uma chave estrangeira e liga ela a um usuario de outra tabela
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventos', function (Blueprint $table) {
            // deleta os registros ligados ao id de chave estrangeira
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }
}
