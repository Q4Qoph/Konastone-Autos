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
        Schema::table('vehicles', function (Blueprint $table): void {
            $table->unsignedTinyInteger('cylinders')->nullable()->after('engine_capacity');
            $table->unsignedTinyInteger('doors')->nullable()->after('cylinders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table): void {
            $table->dropColumn(['cylinders', 'doors']);
        });
    }
};
