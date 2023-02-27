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
        Schema::create('statuses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 16)->unique();
            $table->string('slug')->nullable();
            $table->string('code')->nullable()->unique();
            $table->string('color')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();

            $table->unique(['name'], 'status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
