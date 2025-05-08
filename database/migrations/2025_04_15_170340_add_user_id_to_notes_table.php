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
        Schema::table('notes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id'); // добавляем поле user_id после id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // внешний ключ
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // удаляем внешний ключ
            $table->dropColumn('user_id'); // удаляем поле user_id
        });
    }
};
