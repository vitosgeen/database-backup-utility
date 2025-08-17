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
        Schema::create('backups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('database_id');
            $table->string('filename');
            $table->unsignedBigInteger('size')->nullable(); // in bytes
            $table->string('type')->default('full'); // e.g. full, incremental
            $table->timestamps();

            $table->foreign('database_id')->references('id')->on('databases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backups');
    }
};
