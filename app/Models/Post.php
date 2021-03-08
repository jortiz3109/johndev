<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property string title
 * @property string summary
 * @property string body
 * @property Carbon|null published_at
 * @property Carbon|null featured_at
 * @property string slug
 * @method static orderBy(string $string, string $string1)
 * @method static where(string $string, $id)
 * @method static first()
 * @method static select(string[] $array)
 */
class Post extends Model
{
    use HasFactory;

    protected $dates = [
        'published_at',
        'featured_at',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($post) {
            $post->author_id = auth()->user()->author->id;
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
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
        return $this->created_at->diffForHumans(now());
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at');
    }
}
