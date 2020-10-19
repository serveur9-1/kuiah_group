<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('website')->nullable();
            $table->string('investor_role');
            $table->string('total_amount');
            $table->string('min_amount');
            $table->string('amount_insured');
            $table->text('company_description');
            $table->text('team_description');
            $table->string('company_name');
            $table->string('logo');
            $table->string('banner');
            $table->text('market');
            $table->integer('proof_or_progres');
            $table->string('business_plan_doc');
            $table->string('financial_data_doc');
            $table->text('objective');
            $table->text('executive_summary_doc');
            $table->text('executive_summary');
            $table->text('offer');
            $table->boolean('is_actived')->nullable()->default(0);
            $table->boolean('has_drafted')->nullable()->default(1);

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('country_id')->index();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

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
        Schema::dropIfExists('Projects');
    }
}
