<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('caller_id');
            $table->unsignedBigInteger('operator_id');
            $table->unsignedBigInteger('equipment_id');
            $table->dateTime('call_time');
            $table->unsignedBigInteger('problem_id')->nullable();
            $table->text('description'); // Call description or notes
            $table->timestamps();

            // Foreign keys
            $table->foreign('caller_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('operator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('calls');
    }
}
