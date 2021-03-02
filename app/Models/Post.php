<?php

namespace App\Models;

use App\Helpers\PostBodyHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Parsedown;

/**
 * @property string title
 * @property string summary
 * @property string body
 * @property Carbon|null published_at
 * @property Carbon|null featured_at
 * @property string slug
 */
class Post extends Model
{
    use HasFactory;

    protected $dates = [
        'published_at',
        'featured_at',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault([
            'name' => 'Anonymous',
            'email' => 'me@johndev.co',
        ]);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function visits(): HasMany
    {
        return $this->hasMany(PostVisit::class);
    }

    public function toggleFeatured()
    {
        $this->featured_at = $this->isFeatured() ? null : now();
    }

    public function isFeatured(): bool
    {
        return (bool)$this->featured_at;
    }

    public function togglePublished()
    {
        $this->published_at = $this->isPublished() ? null : now();
    }

    public function isPublished(): bool
    {
        return (bool)$this->published_at;
    }

    public function relativeCreationDate(): string
    {
        return now()->diffForHumans($this->created_at);
    }
}
