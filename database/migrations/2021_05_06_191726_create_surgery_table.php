<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurgeryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgeries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requestedBy');
            $table->foreignId('room');
            $table->foreignId('patient');
            $table->dateTime('startDate', $precision = 0);
            $table->dateTime('endDate', $precision = 0);
            $table->json('doctors');
            $table->timestamps();

            $table->foreign('requestedBy')->references('id')->on('staff')->onDelete('cascade');
            $table->foreign('room')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('patient')->references('id')->on('patients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surgeries');
    }
}
