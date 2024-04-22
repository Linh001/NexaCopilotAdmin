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
        Schema::create('application_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('EmployeeName');
            $table->string('EmployeeCode');
            $table->string('PositionName');
            $table->dateTime('ApplyDate');
            $table->string('Status', 50);
            $table->text('Note')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            // $table->foreign('EmployeeName')->references('EmployeeName')->on('employees')->onDelete('cascade');
            $table->foreign('EmployeeCode')->references('EmployeeCode')->on('employees')->onDelete('cascade');
            $table->foreign('PositionName')->references('PositionName')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_histories');
    }
};
