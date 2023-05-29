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
            $table->increments('issue_id');
            $table->string('project',50);
            $table->string('tracker',50);
            $table->string('assignee',100);
            $table->string('subject',100);
            $table->longText('description');
            $table->string('category',50);
            $table->string('status',100);
            $table->string('priority',100);
            $table->longText('c_action');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('file')->nullable();
            $table->tinyInteger('is_private');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
