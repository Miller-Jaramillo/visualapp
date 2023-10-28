<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role_name')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table
                ->foreign('role_id')
                ->references('id')
                ->on('roles');

            $table->unsignedBigInteger('created_by')->nullable();
            $table
                ->foreign('created_by')
                ->references('id')
                ->on('users');
            $table->timestamp('last_login')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['created_by']);

            $table->dropColumn(['role_name', 'role_id', 'created_by', 'last_login']);
        });
    }
};
