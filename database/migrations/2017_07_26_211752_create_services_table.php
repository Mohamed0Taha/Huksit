<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
             $table->timestamps();
              $table->text('discription');
               $table->string('title');
                $table->string('image');
                 $table->integer('price')->default('0.0');
                  $table->integer('salon_id');
                   $table->string('av_from')->default('8:00');
                    $table->string('av_to')->default('17:00');
                 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
