<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('salons', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('name', 30);
                $table->text('image');
                $table->string('address', 100);
                $table->text('discription');
                $table->integer('user_id');
                $table->decimal('longitude', 10, 7);
                $table->decimal('latitude', 10, 7);

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('salons');
    }
}
