<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 128); // campo nombre con maximo 64 caracteres
            $table->string('slug', 128)->unique(); // campo slug con maximo 128 caracteres, para url amigables
            $table->mediumtext('excerpt')->nullable();
            $table->text('body');
            $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('DRAFT');
            $table->string('file', 128)->nullable(); // campo para la imagen, el mismo puede estar vacio.

            // Tambien va a tener los campos user_id y category_id, ya que un post pertenece a un usuario y tambien a una categoria
            $table->integer('user_id')->unsigned(); // unsigned para que no permita numeros negativos
            $table->integer('category_id')->unsigned();

            // Relaciones
            $table->foreign('user_id')->references('id')->on('users') // el user_id de la tabla posts hacer referencia al id de la tabla usuarios
                ->onDelete('cascade'); // Al borrar un usuario se eliminaria en cascada todos los post de ese usuario

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
               
               
                
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
        Schema::dropIfExists('posts');
    }
}
