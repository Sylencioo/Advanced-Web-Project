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
        Schema::create('academicians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('staff_number')->unique();
            $table->string('email')->unique();
            $table->string('college');
            $table->string('department');
            $table->enum('position', ['Professor', 'Associate Professor', 'Senior Lecturer', 'Lecturer']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academicians');
    }
};
