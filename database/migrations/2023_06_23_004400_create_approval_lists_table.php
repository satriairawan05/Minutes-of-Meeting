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
        Schema::create('approval_lists', function (Blueprint $table) {
            $table->increments('app_list_id');
            $table->string('app_module')->nullable();
            $table->string('app_ordinal')->nullable();
            $table->string('app_user')->nullable();
            $table->string('app_closer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_lists');
    }
};
