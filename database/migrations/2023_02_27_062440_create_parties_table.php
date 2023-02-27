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
        Schema::create('parties', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('active')->default(1);
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->string('code')->nullable()->unique();
            $table->string('sloggan')->nullable();
            //
            $table->foreignUuid('status_code')->default(1)->constrained('statuses', 'code')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name'], 'party');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parties');
    }
};
