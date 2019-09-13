<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_allocations', function (Blueprint $table) {
            $table->bigIncrements('allocation_id');
            $table->unsignedBigInteger('course_id')->references('course_id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('staff_id')->references('staff_id')->on('staffs')->onDelete('cascade');
            $table->string('program');
            $table->string('level');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_allocations');
    }
}
