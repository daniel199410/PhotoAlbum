<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        if (!Schema::hasTable('Usuarios')) {
            Schema::create('Usuarios', function(Blueprint $table){
                $table->string('name');
                $table->string('nickname', 25);
                $table->string('password');
                $table->primary('nickname');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('Usuarios');
    }
}
