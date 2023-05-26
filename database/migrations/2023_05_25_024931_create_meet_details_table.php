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
        Schema::create('issues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project',50);
            $table->string('tracker',50);
            $table->string('subject',100);
            $table->longText('description');
            $table->string('status',100);
            $table->string('priority',100);
            $table->date('start_date');
            $table->date('end_date');
            $table->text('c_action');
            $table->string('assigned',100)->nullable();
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
