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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('id пользователя, который добавил сообщение');
            $table->string('content')->comment('содержимое сообщения');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users'); // связь с др. таблицей
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};

