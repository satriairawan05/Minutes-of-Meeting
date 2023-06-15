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
            $table->string('issue_xid',50);
            $table->string('project',50);
            $table->string('tracker',50);
            $table->string('subject',100);
            $table->longText('c_action')->nullable();
            $table->longText('description');
            $table->string('status',100);
            $table->string('priority',100);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('file')->nullable();
            $table->string('assignee',100);
            $table->tinyInteger('is_private')->nullable();
            $table->string('approvedby')->nullable();
            $table->string('status_approved')->nullable();
            $table->longText('keterangan_approved')->nullable();
            $table->timestamps();
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
