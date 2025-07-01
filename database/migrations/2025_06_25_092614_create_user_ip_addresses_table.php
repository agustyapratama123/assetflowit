<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_ip_addresses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('ip_address', 45)->unique(); // support IPv4 dan IPv6

            $table->foreignId('asset_id')->nullable()->constrained('assets')->nullOnDelete();
            $table->foreignId('location_id')
              ->nullable()
              ->constrained('locations')
              ->nullOnDelete();
            $table->foreignId('category_id')
              ->nullable()
              ->constrained('categories')
              ->nullOnDelete();
            $table->dateTime('assigned_at');
            $table->dateTime('released_at')->nullable();
            

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_ip_addresses');
    }
};
