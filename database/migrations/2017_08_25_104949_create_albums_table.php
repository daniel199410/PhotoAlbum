<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        if (!Schema::hasTable('Album')) {
            Schema::create('Album', function(Blueprint $table){
                $table->string('name');
                $table->string('description');
                $table->string('nickname', 25);
                $table->foreign('nickname')->references('nickname')->on('usuarios');
                $table->primary(['name', 'nickname']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('Album');
    }
}
