<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('website')->nullable();
            $table->string('investor_role');
            $table->string('total_amount');
            $table->string('min_amount');
            $table->string('amount_insured');
            $table->text('description');
            $table->string('company_name');
            $table->string('logo');
            $table->string('banner');
            $table->text('market');
            $table->text('progress');
            $table->string('business_plan');
            $table->text('objective');
            $table->text('executive_summary');
            $table->boolean('is_pret')->nullable()->default(0);
            $table->boolean('is_new')->nullable()->default(0);
            $table->boolean('is_actif')->nullable()->default(0);

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('domaine_id')->index();
            $table->foreign('domaine_id')->references('id')->on('domaines')->onDelete('cascade');

            $table->unsignedBigInteger('stade_id')->index();
            $table->foreign('stade_id')->references('id')->on('stades')->onDelete('cascade');
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
        Schema::dropIfExists('articles');
    }
}
