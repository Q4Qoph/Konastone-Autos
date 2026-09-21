<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('enquiries', function (Blueprint $table): void {
            $table->foreignId('assigned_to')->nullable()->after('source')->constrained('users')->nullOnDelete();
            $table->timestamp('follow_up_at')->nullable()->after('assigned_to');
            $table->text('internal_notes')->nullable()->after('follow_up_at');
        });
    }

    public function down(): void
    {
        Schema::table('enquiries', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('assigned_to');
            $table->dropColumn(['follow_up_at', 'internal_notes']);
        });
    }
};
