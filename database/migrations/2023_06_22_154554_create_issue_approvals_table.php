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
            $table->increments('ia_id');
            $table->foreignId('issue_id');
            $table->foreignId('app_list_id');
            $table->string('app_by');
            $table->date('app_date');
            $table->boolean('app_status')->default(false);
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
