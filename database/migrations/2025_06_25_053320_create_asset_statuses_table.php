<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('asset_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50); // e.g. active, inactive, maintenance, retired
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asset_statuses');
    }
};
