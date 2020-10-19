<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Other_docs', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->unsignedBigInteger('project_id')->index();
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Other_docs');
    }
}
