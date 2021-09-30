<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('course_id');
            $table->string('name', 50);
            $table->string('slug')->unique();
            $table->float('price',  4,2);
            $table->text('description');
            $table->text('img');
            $table->tinyInteger('visible')->default(1);
            $table->timestamps();

            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plates');
    }
}
