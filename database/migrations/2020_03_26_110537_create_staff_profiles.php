<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('staff_profiles');
        Schema::create('staff_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Adm_No');
            $table->string('subjects')->nullable();
            $table->string('class')->nullable();
            $table->string('bio')->nullable();
            $table->string('position')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('skills')->nullable();
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
        Schema::dropIfExists('staff_profiles');
    }
}
