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
//        Schema::create('applicant_counters', function (Blueprint $table) {
//            $table->id();
//            $table->integer('year')->unique();
//            $table->integer('last_count')->default(0);
//            $table->timestamps();
//        });
        Schema::create('applicant_counters', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('application_type');  // Add this field
            $table->integer('last_count')->default(0);
            $table->timestamps();

            // Change the unique constraint to include both year and application_type
            // This ensures each year+type combination is unique
            $table->unique(['year', 'application_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_counters');
    }
};
