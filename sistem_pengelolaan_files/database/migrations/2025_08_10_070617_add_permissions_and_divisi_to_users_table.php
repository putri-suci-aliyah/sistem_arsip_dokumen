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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('divisi_id')->constrained('divisis')->onDelete('cascade');
            $table->boolean('is_super_admin')->default(false)->after('divisi_id');
            $table->boolean('is_create')->default(false)->after('is_super_admin');
            $table->boolean('is_delete')->default(false)->after('is_create');
            $table->boolean('is_update')->default(false)->after('is_delete');
            $table->boolean('is_read')->default(false)->after('is_update');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'divisi_id',
                'is_super_admin',
                'is_create',
                'is_delete',
                'is_update',
                'is_read',
            ]);
        });
    }
};
