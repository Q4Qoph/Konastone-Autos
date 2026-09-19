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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->restrictOnDelete();
            $table->string('model');
            $table->string('trim')->nullable();
            $table->string('slug')->unique();
            $table->unsignedSmallInteger('year');
            $table->string('condition');
            $table->string('stock_number')->nullable()->unique();
            $table->string('chassis_number')->nullable();
            $table->string('engine')->nullable();
            $table->unsignedInteger('engine_capacity')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('transmission')->nullable();
            $table->string('drivetrain')->nullable();
            $table->string('body_type')->nullable();
            $table->unsignedInteger('mileage')->nullable();
            $table->string('exterior_color')->nullable();
            $table->string('interior_color')->nullable();
            $table->decimal('price', 15, 2);
            $table->decimal('previous_price', 15, 2)->nullable();
            $table->string('currency', 3)->default('KES');
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_negotiable')->default(false);
            $table->boolean('financing_available')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamp('sold_at')->nullable();
            $table->index(['status', 'published_at']);
            $table->index(['brand_id', 'status']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
