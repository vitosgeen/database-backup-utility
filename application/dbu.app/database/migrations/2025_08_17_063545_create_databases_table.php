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
        Schema::create('databases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // link to logged-in user
            $table->string('name');
            $table->string('type'); // e.g. mysql, pgsql
            $table->string('host');
            $table->integer('port');
            $table->string('username');
            $table->string('password'); // in real apps, encrypt this!
            $table->string('database_name');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databases');
    }
};
