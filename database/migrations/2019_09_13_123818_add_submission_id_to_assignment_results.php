<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubmissionIdToAssignmentResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assignment_results', function (Blueprint $table) {
            $table->unsignedBigInteger('submission_id')->references('submission_id')->on('assignment_solutions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assignment_results', function (Blueprint $table) {
            //
        });
    }
}
