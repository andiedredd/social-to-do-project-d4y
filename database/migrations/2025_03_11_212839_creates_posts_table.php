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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id')->comment('блог');
            $table->string('name')->comment('название поста');
            $table->text('text')->comment('текст/содержание поста');
            $table->timestamps();

            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs'); // связь с др. таблицей
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
