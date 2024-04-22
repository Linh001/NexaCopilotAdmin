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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('Type', 50);
            $table->string('Sender');
            $table->string('Receiver');
            $table->text('Content');
            $table->string('Status', 20);
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('Sender')->references('CustomerCode')->on('customers')->onDelete('cascade');
            $table->foreign('Receiver')->references('EmployeeCode')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
