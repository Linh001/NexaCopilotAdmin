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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('EmployeeCode', 20)->unique();
            $table->string('EmployeeName', 50);
            $table->string('Avatar', 50);
            $table->string('Gender', 10);
            $table->unsignedInteger('Age');
            $table->date('DateOfBirth');
            $table->string('EducationLevel', 50);
            $table->string('Expertise', 100);
            $table->string('Degree', 50);
            $table->string('Status', 50);
            $table->string('ResumeImage', 50);
            $table->text('ApplicationHistory')->nullable();
            $table->text('ApplicationSchedule')->nullable();
            $table->dateTime('LastUpdate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
