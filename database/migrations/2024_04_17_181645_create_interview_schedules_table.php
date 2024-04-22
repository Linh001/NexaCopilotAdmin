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
        Schema::create('interview_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('RecruitmentCode');
            $table->string('EmployeeCode');
            $table->string('CustomerCode');
            $table->dateTime('InterviewTime');
            $table->string('Result');
            $table->text('Note')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('RecruitmentCode')->references('RecruitmentCode')->on('recruitment_needs')->onDelete('cascade');
            $table->foreign('EmployeeCode')->references('EmployeeCode')->on('employees')->onDelete('cascade');
            $table->foreign('CustomerCode')->references('CustomerCode')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interview_schedules');
    }
};
