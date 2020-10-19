<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tag_id')->index();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            $table->unsignedBigInteger('project_id')->index();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('investor_project');
    }
}
