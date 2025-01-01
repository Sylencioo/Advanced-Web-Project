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
        Schema::create('milestones', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('grant_id')->constrained()->onDelete('cascade');
            $table->string('milestone_name'); // Name of the milestone
            $table->date('target_completion_date'); // Target completion date
            $table->text('deliverable')->nullable(); // Deliverable details (optional)
            $table->enum('status', ['pending', 'completed', 'overdue'])->default('pending'); // Status of the milestone
            $table->text('remark')->nullable(); // Remarks about the milestone update
            $table->date('date_updated')->nullable(); // Date the milestone was last updated
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};
