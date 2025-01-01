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
            $table->unsignedBigInteger('grant_id'); // Reference to Grant
            $table->text('description');
            $table->enum('status', ['ongoing', 'completed', 'pending'])->default('ongoing');
            $table->decimal('progress', 5, 2)->default(0); // Percentage
            $table->foreign('grant_id')->references('id')->on('grants')->onDelete('cascade');
            $table->timestamps();
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
