<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id('act_id')->nullable();
            $table->string('act_subject',100)->nullable();
            $table->string('act_problem',100)->nullable();
            $table->string('act_corrective',100)->nullable();
            $table->string('act_user',100)->nullable();
            $table->string('act_assignby',100)->nullable();
            $table->string('act_acc1',100)->nullable();
            $table->string('act_acc2',100)->nullable();
            $table->date('act_duedate')->nullable();
            $table->increments('act_counter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
