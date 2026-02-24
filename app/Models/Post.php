<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Authenticatable
{
    
    use HasFactory, Notifiable;

    /**
     * 
     * 
     * @return void
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function images(): HasMany
    {
        return $this->HasMany(PostImage::class);
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
