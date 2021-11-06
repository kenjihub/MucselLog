<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedBiginteger('user_id');
            $table->unsignedBigInteger('parts_id');
            $table->timestamps();
            $table->dropColumn('updated_at');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('parts_id')
                ->references('id')
                ->on('parts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history');
    }
}
