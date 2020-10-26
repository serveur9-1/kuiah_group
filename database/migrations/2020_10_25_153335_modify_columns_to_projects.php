<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->string('investor_role')->nullable()->change();
            $table->string('total_amount')->nullable()->change();
            $table->string('min_amount')->nullable()->change();
            $table->string('amount_insured')->nullable()->change();
            $table->text('company_description')->nullable()->change();
            $table->text('team_description')->nullable()->change();
            $table->string('company_name')->nullable()->change();
            $table->string('logo')->nullable()->change();
            $table->string('banner')->nullable()->change();
            $table->text('market')->nullable()->change();
            $table->integer('proof_or_progres')->nullable()->change();
            $table->string('business_plan_doc')->nullable()->change();
            $table->string('financial_data_doc')->nullable()->change();
            $table->text('objective')->nullable()->change();
            $table->text('executive_summary_doc')->nullable()->change();
            $table->text('executive_summary')->nullable()->change();
            $table->text('offer')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
}
