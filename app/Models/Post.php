<?php

namespace App\Models;

use App\Enums\PostStatus;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $casts = [
        'status' => PostStatus::class
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function is_viewed(User $user): bool
    {
        return DB::table('history')
            ->where('post_id', $this->id)
            ->where('user_id', $user->id)
            ->exists();
    }

    public function is_liked(User $user): bool
    {
        return DB::table('history')
            ->where('post_id', $this->id)
            ->where('user_id', $user->id)
            ->value('is_liked');
    }

    public static function getFeaturedPosts(): Collection
    {
        return Post::where('status', PostStatus::Featured)
            ->with('categories')
            ->get();
    }

    public static function getLatestPosts(int $limit): Collection
    {
        return Post::orderBy('created_at')
            ->with('categories', 'user')
            ->limit($limit)
            ->get();
    }

    public function saveLikeInHistory($user): void
    {
        DB::table('history')
                    ->where('post_id', $this->id)
                    ->where('user_id', $user)
                    ->update([
                        'is_liked' => true
                    ]);
    }

    public function saveDislikeInHistory($user): void
    {
        DB::table('history')
                    ->where('post_id', $this->id)
                    ->where('user_id', $user)
                    ->update([
                        'is_liked' => false
                    ]);
    }
}
