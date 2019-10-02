<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('movies');
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id_movie');
            $table->string('title');
            $table->text('description');
            $table->date('launched_at');
            $table->string('awars');
            $table->string('total_sold');
            $table->string('url_image');
            $table->string('rate');
            $table->string('tags');
            $table->string('long_time');            
            $table->string('direct_by');            
            $table->integer('user_created');
            $table->integer('user_edited');
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
        Schema::dropIfExists('movies');
    }
}
