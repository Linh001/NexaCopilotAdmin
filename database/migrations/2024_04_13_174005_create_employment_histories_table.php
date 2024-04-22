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
        Schema::create('employment_histories', function (Blueprint $table) {
            $table->id();
            $table->string('EmployeeName');
            $table->string('EmployeeCode');
            $table->string('CompanyName', 100);
            $table->string('Position', 100);
            $table->date('StartDate');
            $table->date('EndDate');
            $table->timestamps();

            // Define foreign key constraint
            // $table->foreign('EmployeeName')->references('EmployeeName')->on('employees')->onDelete('cascade');
            $table->foreign('EmployeeCode')->references('EmployeeCode')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_histories');
    }
};
