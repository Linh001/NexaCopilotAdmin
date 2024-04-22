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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('userName');
            $table->string('password');
            $table->string('firstName');
            $table->string('avatar')->nullable();
            $table->string('lastName');
            $table->string('email');
            $table->string('RoleCode');
            $table->boolean('accountStatus')->default(1)->index();
            $table->timestamps();
            
            
            $table->foreign('RoleCode')->references('RoleCode')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
