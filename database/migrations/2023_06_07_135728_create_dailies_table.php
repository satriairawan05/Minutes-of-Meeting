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
        Schema::create('dailies', function (Blueprint $table) {
            $table->increments('daily_id');
            $table->string('daily_xid',50);
            $table->string('departemen',50);
            $table->string('subject',100);
            $table->longText('c_action');
            $table->longText('description_daily');
            $table->string('status',100);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('file')->nullable();
            $table->string('assignee',100);
            $table->string('pic',100);
            $table->tinyInteger('is_private')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dailies');
    }
};
