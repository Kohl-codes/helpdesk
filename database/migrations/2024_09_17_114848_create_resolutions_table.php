<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResolutionsTable extends Migration
{
    public function up()
    {
        Schema::create('resolutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('call_id'); // Refers to the call in 'calls' table
            $table->text('resolution_description'); // Detailed description of how the problem was solved
            $table->dateTime('resolved_at'); // Date and time when the issue was resolved
            $table->integer('time_taken'); // Time taken to resolve the issue (in minutes or hours)
            $table->timestamps();

            // Foreign key
            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('resolutions');
    }
}
