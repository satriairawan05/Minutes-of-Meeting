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
        Schema::create('approval_histories', function (Blueprint $table) {
            $table->increments('app_his_id');
            $table->string('app_module')->nullable(); // nama modulnya issue / dwm
            $table->string('app_id')->nullable(); //id issue_approval / daily approval
            $table->string('app_user')->nullable(); 
            $table->string('app_status')->nullable();
            $table->longText('app_his_note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_histories');
    }
};
