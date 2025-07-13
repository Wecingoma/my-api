<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'likes',
        'user_id',
    ];
    // protected $casts = [
    //     'likes' => 'integer',
    // ];

    protected $appends = [
        'is_liked','like_count',
    ];
    protected $with = [
        'likedBy',
    ];
    
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function likeBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function getIsLikedAttribute(): bool
    {
        // return $this->likedBy->contains(auth()->user());
        // return Auth::check() && $this->likedBy->contains(auth()->user()->id);
        // return Auth::check() && $this->likedBy->contains('id', Auth::user()->id);
        return Auth::check() && $this->likedBy->contains('id', Auth::id());
    }

    public function getLikeCountAttribute(): int
    {
        return $this->likedBy->count();
    }
}
