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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('bu_name');
            $table->string('bu_id');
            $table->string('system_pic');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('duration');
            $table->string('status');
            $table->string('lead_dev');
            $table->string('request_type');
            $table->string('system_id');
            $table->string('system_name');
            $table->boolean('approved');
            $table->string('development_methodology');
            $table->string('system_platform');
            $table->string('deployment_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
