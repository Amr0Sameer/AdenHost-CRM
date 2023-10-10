<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('project_name');
            $table->string('company_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('workers');
            $table->integer('progress');
            $table->unsignedBigInteger('stat')->index();

            $table->foreign('stat')->references('id')->on('stat')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
