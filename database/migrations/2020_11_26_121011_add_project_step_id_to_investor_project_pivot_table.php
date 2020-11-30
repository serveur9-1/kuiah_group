<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectStepIdToInvestorProjectPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investor_project', function (Blueprint $table) {
            $table->unsignedBigInteger('interesting_project_step_id')->index();
            $table->foreign('interesting_project_step_id')->references('id')->on('interesting_project_steps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investor_project', function (Blueprint $table) {
            //
        });
    }
}
