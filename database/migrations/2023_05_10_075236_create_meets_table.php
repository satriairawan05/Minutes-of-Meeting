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
        Schema::create('meets', function (Blueprint $table) {
            $table->id('meet_id');
            $table->string('meet_name',100)->nullable();
            $table->date('meet_date')->nullable();
            $table->time('meet_time')->nullable();
            $table->string('meet_preparedby',100)->nullable();
            $table->string('meet_locate',100)->nullable();
            $table->string('meet_attend',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meets');
    }
};
