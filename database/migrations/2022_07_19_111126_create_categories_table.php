<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('category_id');
           $table->text('icon')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
