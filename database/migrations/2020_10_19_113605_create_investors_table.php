<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->boolean('receive_mail')->nullable()->default(1);
            $table->boolean('is_deleted');
            $table->string('country');
            $table->string('city');
            $table->string('f_number')->nullable();
            $table->string('p_number')->nullable();
            $table->string('birthday')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('identity')->nullable();
            $table->string('description');
            $table->string('website')->nullable();
            $table->string('company_name')->nullable();
            $table->string('post')->nullable();
            $table->string('domain')->nullable();
            $table->string('min');
            $table->string('max');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('investors');
    }
}
