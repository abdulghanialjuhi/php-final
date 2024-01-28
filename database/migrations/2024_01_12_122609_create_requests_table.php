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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('bu_id', 30)->nullable(false);
            $table->string('description', 50)->nullable(false);
            $table->string('system_name', 20)->nullable(false);
            $table->string('status')->nullable(false);
            $table->string('system_id', 20)->default("");
            $table->string('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
