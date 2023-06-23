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
        Schema::create('issue_approvals', function (Blueprint $table) {
            $table->increments('iss_app_id');
            $table->string('issue_id')->nullable();
            $table->string('app_list_id')->nullable();
            $table->string('iss_app_user')->nullable();
            $table->date('iss_app_date')->nullable();
            $table->string('iss_app_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_approvals');
    }
};
