<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('act_id');
            $table->string('act_subject', 100)->nullable();
            $table->string('act_problem', 100)->nullable();
            $table->string('act_corrective', 100)->nullable();
            $table->string('act_user', 100)->nullable();
            $table->string('act_assignby', 100)->nullable();
            $table->string('act_acc1', 100)->nullable();
            $table->string('act_acc2', 100)->nullable();
            $table->date('act_duedate')->nullable();
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
        Schema::dropIfExists('actions');
    }
}