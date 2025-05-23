<?php

use App\Models\Post;
use App\Models\User;
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

            $table->foreignIdFor(User::class)
                ->constrained();

            $table->string('title');
            
            $table->string('image')
                ->nullable();

            $table->text('content');
            $table->string('status');
            $table->unsignedBigInteger('views');
            $table->unsignedBigInteger('likes');
            $table->timestamps();
        });

        Schema::create('history', function(Blueprint $table){
            $table->foreignIdFor(User::class)
                ->constrained();

            $table->foreignIdFor(Post::class)
                ->constrained();

            $table->boolean('is_liked');
        });

        Schema::create('category_post', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }
};
