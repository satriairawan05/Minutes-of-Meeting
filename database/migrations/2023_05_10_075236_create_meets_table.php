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
            $table->string('meet_id',50);
            $table->primary('meet_id');
            $table->string('meet_name',100);
            $table->date('meet_date');
            $table->time('meet_time');
            $table->string('meet_preparedby',100);
            $table->string('meet_locate',100);
            $table->string('meet_attend',100);
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
