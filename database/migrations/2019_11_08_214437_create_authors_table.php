<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            // PRIMARY
            $table->bigIncrements('id');
            $table->string('public_id', 12);

            // ADDITIONAL
            $table->string('name')->nullable();
            $table->string('avatar')->nullable();

            // DATES
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
