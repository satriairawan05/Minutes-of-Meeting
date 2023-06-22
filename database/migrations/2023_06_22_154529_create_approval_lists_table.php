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
            $table->string('app_module');
            $table->integer('app_ordinal');
            $table->string('app_pic');
            $table->boolean('app_closing')->default(false);
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
