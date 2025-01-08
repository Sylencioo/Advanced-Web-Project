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
        Schema::table('academicians', function (Blueprint $table) {
            $table->enum('position', ['Professor', 'Associate Professor', 'Lecturer'])->change();
        });
    }
    
    public function down(): void
    {
        Schema::table('academicians', function (Blueprint $table) {
            $table->enum('position', ['Professor', 'Assoc Prof. Senior Lecturer', 'Lecturer'])->change();
        });
    }
    
};
