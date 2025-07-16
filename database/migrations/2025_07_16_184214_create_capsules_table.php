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
        Schema::create('capsules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('users')->onDelete('cascade');
            $table->string('title');
            $table->string('message');
            $table->datetime('reveal_date');
            $table->string('country')->nullable();
            $table->enum('mood',['Happy', 'Sad', 'Excited', 'Angry', 'Anxious', 'Grateful',
                                'Nostalgic', 'Romantic', 'Lonely', 'Peaceful', 'Confident',
                                'Hopeful', 'Embarrassed', 'Curious', 'Inspired', 'Bored',
                                'Surprised', 'Tired', 'Determined', 'Calm'])->nullable();
            $table->string('tag')->nullable();
            $table->enum('privacy',['public', 'private', 'unlisted']);
            $table->boolean('is_surprise')->default(false);
            $table->boolean('is_activated')->default(false);
            $table->timestamps();
        });

        Schema::create('attachements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('capsule_id')->references('capsules')->onDelete('cascade');
            $table->string('file_type');
            $table->
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capsules');
    }
};
