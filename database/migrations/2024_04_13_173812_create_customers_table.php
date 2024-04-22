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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('CustomerCode', 20)->unique();
            $table->string('Logo', 50);
            $table->string('CustomerName', 50)->unique();
            $table->string('CompanyName', 100);
            $table->text('CompanyDescription')->nullable();
            $table->string('Email', 100);
            $table->string('Address', 255);
            $table->time('WorkingHoursStart');
            $table->time('WorkingHoursEnd');
            $table->string('Website', 255);
            $table->string('PhoneNumber', 20);
            $table->string('DomainName');
            $table->timestamps(); 
            $table->foreign('DomainName')->references('DomainName')->on('domains')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
