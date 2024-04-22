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
        Schema::create('recruitment_needs', function (Blueprint $table) {
            $table->id();
            $table->string('RecruitmentCode')->unique();
            $table->string('PositionName');
            $table->string('CustomerName');
            // $table->string('CustomerCode');
            $table->string('JobTitle', 100);
            $table->text('Description')->nullable();
            $table->enum('Level',['High School Diploma','Bachelor Degree','Master Degree','Graduate Degree','Vocational Training / Trade School Certification','Professional Certification'])->default('Bachelor Degree');
            $table->string('Salary', 100);
            $table->string('Experience', 100);
            $table->integer('Application Number')->nullable();
            $table->timestamps();

            $table->foreign('CustomerName')->references('CustomerName')->on('customers')->onDelete('cascade');
            $table->foreign('PositionName')->references('PositionName')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment_needs');
    }
};
