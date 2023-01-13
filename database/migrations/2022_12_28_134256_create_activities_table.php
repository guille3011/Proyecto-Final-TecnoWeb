<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            //$table->text('observation')->nullable();
            $table->date('date_ini');
            $table->date('date_fin');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_status')->default(1);
            $table->unsignedBigInteger('id_periodo');
            $table->smallInteger('estado')->default(1);
    
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_status')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_periodo')->references('id')->on('periodos')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('activities');
    }
}
