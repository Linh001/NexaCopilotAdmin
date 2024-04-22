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
        Schema::create('c_v_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('EmployeeID');
            $table->integer('Version');
            $table->string('Title', 100);
            $table->text('Description')->nullable();
            $table->text('Content');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('EmployeeID')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_v_s');
    }
};
