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
        Schema::create('archives', function (Blueprint $table) {
            $table->increments('archive_id');
            $table->string('meet_id');
            $table->string('meet_xid');
            $table->string('meet_project',20);
            $table->string('meet_name',100);
            $table->date('meet_date');
            $table->time('meet_time');
            $table->string('meet_preparedby',100);
            $table->string('meet_locate',100);
            $table->string('meet_attend',100);
            $table->string('issue_id');
            $table->string('issue_xid');
            $table->string('project',50);
            $table->string('tracker',50);
            $table->string('subject',100);
            $table->longText('c_action');
            $table->longText('description');
            $table->string('status',100);
            $table->string('priority',100);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('file')->nullable();
            $table->string('assignee',100);
            $table->tinyInteger('is_private')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};
