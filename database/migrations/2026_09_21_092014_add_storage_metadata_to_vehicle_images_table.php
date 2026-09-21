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
        Schema::table('vehicle_images', function (Blueprint $table): void {
            $table->string('disk')->default('r2')->after('vehicle_id');
            $table->string('original_name')->nullable()->after('path');
            $table->string('mime_type', 100)->nullable()->after('original_name');
            $table->unsignedBigInteger('file_size')->nullable()->after('mime_type');
            $table->unsignedInteger('width')->nullable()->after('file_size');
            $table->unsignedInteger('height')->nullable()->after('width');
            $table->string('checksum', 64)->nullable()->after('height');
            $table->json('variants')->nullable()->after('checksum');
            $table->foreignId('uploaded_by')->nullable()->after('variants')->constrained('users')->nullOnDelete();

            $table->index(['vehicle_id', 'is_cover']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicle_images', function (Blueprint $table): void {
            $table->dropForeign(['uploaded_by']);
            $table->dropIndex(['vehicle_id', 'is_cover']);
            $table->dropColumn([
                'disk',
                'original_name',
                'mime_type',
                'file_size',
                'width',
                'height',
                'checksum',
                'variants',
                'uploaded_by',
            ]);
        });
    }
};
