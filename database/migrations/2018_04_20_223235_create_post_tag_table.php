<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('post_id')->unsigned(); // unsigned para que no permita numeros negativos
            $table->integer('tag_id')->unsigned();

            // Relaciones
            $table->foreign('post_id')->references('id')->on('posts') // el user_id de la tabla posts hacer referencia al id de la tabla usuarios
                ->onDelete('cascade'); // Al borrar un usuario se eliminaria en cascada todos los post de ese usuario
              
            $table->foreign('tag_id')->references('id')->on('tags')
                ->onDelete('cascade');

            $table->timestamps();
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('posts');
    }
}
