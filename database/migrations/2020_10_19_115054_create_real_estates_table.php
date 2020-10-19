<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estates', function (Blueprint $table) {

            $table->id();
            $table->string("title");
            $table->longText("description");
            $table->integer("price")->default(0);

            $table->unsignedBigInteger('country_id')->unsigned()->index();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

            $table->string("location")->nullable();
            $table->string("contact")->nullable();
            $table->string("email")->nullable();

            $table->boolean("is_actived")->default(0);
            $table->boolean("is_archived")->default(0);

            $table->unsignedBigInteger('media_id')->index();
            $table->foreign('media_id')->references('id')->on('medias')->onDelete('cascade');

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
        Schema::dropIfExists('real_estates');
    }
}
