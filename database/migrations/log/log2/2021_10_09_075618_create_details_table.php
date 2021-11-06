<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->unsignedBigInteger('history_id');
            $table->unsignedBigInteger('workout_id');
            $table->integer('weight');
            $table->integer('reps');
            $table->string('comment',30)->nullable();
            $table->timestamps();
            $table->foreign('history_id')
                ->references('id')
                ->on('history');
            $table->foreign('workout_id')
                ->references('id')
                ->on('workouts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
