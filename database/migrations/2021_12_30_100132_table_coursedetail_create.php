<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCoursedetailCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->string('about', 2000);
            $table->string('fee', 2000);
            $table->string('offered', 2000);
            $table->string('syllabus', 2000);
            $table->string('apply', 2000);
            $table->string('fee_schedule', 2000);
            $table->string('guidelines', 2000);
            $table->string('course_id');
            $table->foreign('course_id')->references('id')->on('course_tbl');
            $table->string('is_deleted');
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
        //
    }
}
