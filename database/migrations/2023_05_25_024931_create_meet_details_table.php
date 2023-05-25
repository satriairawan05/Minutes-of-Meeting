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
        Schema::create('meet_details', function (Blueprint $table) {
            $table->id();
            $table->string('project');
            $table->string('tracker');
            $table->string('subject');
            $table->longText('description');
            $table->string('status');
            $table->string('priority');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('file')->nullable();
            $table->boolean('is_private');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meet_details');
    }
};
