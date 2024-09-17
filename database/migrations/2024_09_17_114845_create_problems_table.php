<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemsTable extends Migration
{
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->string('problem_type'); // Type of the problem (e.g., software issue, hardware issue)
            $table->unsignedBigInteger('parent_id')->nullable(); // For problem hierarchies
            $table->timestamps();

            // Foreign key for problem refinement (optional)
            $table->foreign('parent_id')->references('id')->on('problems')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('problems');
    }
}
