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
            $table->boolean("is_investor");
            $table->boolean('receive_mail')->nullable()->default(true);
            $table->boolean('is_deleted')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('f_number')->nullable();
            $table->string('p_number')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->text('biography');
            $table->string('website')->nullable();
            $table->string('company_name')->nullable();
            $table->string('role')->nullable();
            $table->text('domain')->nullable();
            $table->integer('min');
            $table->integer('max');

            $table->unsignedBigInteger('user_id')->unsigned()->index();
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
