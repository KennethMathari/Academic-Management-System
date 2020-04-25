<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_records', function (Blueprint $table) {
            $table->string('student_id');
            $table->string('student_name');
            $table->string('title');
            $table->string('english');
            $table->string('kiswahili');
            $table->string('mathematics');
            $table->string('science');
            $table->string('social_studies');
            $table->string('religious_education');
            $table->string('total');
            $table->string('class_name');
            $table->string('teacher_id');
            $table->string('teacher_name');
            $table->string('year');
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
        Schema::dropIfExists('performance_records');
    }
}
