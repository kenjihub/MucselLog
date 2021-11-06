<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail', function (Blueprint $table) {
            //↓↓下記を追加するとmigrateできた $ php artisan migrate:refresh  --step=1 --path=/database/migrations/2021_10_07_081356_create_detail_table.php
            //$table->increments('id')->unsigned(); //テーブルにはこのカラムが追加されなかったので、恐らくひとつ前の状態のmigrationが反映されたかも？？
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
                ->on('workout');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail');
    }
}
