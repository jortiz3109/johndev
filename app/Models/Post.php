<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $dates = [
        'published_at',
        'featured_at',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function visits(): HasMany
    {
        return $this->hasMany(PostVisit::class);
    }

    public function isPublished(): bool
    {
        return (bool) $this->published_at;
    }

    public function isFeatured(): bool
    {
        return (bool) $this->featured_at;
    }

    public function toggleFeatured()
    {
        $this->featured_at = $this->isFeatured() ? null : now();
    }

    public function togglePublished()
    {
        $this->published_at = $this->isPublished() ? null : now();
    }
}
