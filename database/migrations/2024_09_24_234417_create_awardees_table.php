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
        Schema::create('awardees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tagged_and_validated_applicant_id')->constrained('tagged_and_validated_applicants')->onDelete('cascade');
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade');
            $table->foreignId('lot_id')->constrained('lot_lists')->onDelete('cascade');
            $table->decimal('lot_size', 8, 2); // For the numeric value
            $table->foreignId('lot_size_unit_id')->constrained('lot_size_units')->onDelete('cascade');
//            $table->string('letter_of_intent_photo', 255)->nullable();
//            $table->string('voters_id_photo', 255)->nullable();
//            $table->string('valid_id_photo', 255)->nullable();
//            $table->string('certificate_of_no_land_holding_photo', 255)->nullable();
//            $table->string('marriage_certificate_photo', 255)->nullable();
//            $table->string('birth_certificate_photo', 255)->nullable();
            $table->dateTime('grant_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awardees');
    }
};