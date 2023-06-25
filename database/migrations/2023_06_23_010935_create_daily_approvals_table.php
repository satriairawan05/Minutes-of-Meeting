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
        Schema::create('daily_approvals', function (Blueprint $table) {
            $table->increments('dai_app_id');
            $table->string('daily_id')->nullable();
            $table->string('app_list_id')->nullable();
            $table->string('dai_departemen')->nullable();
            $table->string('dai_app_user')->nullable();
            $table->date('dai_app_date')->nullable();
            $table->string('dai_app_status')->nullable();
            $table->string('dai_app_ordinal')->nullable();
            $table->longText('dai_app_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_approvals');
    }
};
