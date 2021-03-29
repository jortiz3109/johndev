<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 * @method static select(string $string, string $string1, string $string2)
 * @property int id
 * @property User user
 * @property string about
 * @property string avatar
 * @property int user_id
 */
class Author extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'avatar', 'about'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function getNameAttribute(): ?string
    {
        return $this->user->name ?? null;
    }

    public function getEmailAttribute(): ?string
    {
        return $this->user->email ?? null;
    }
}
