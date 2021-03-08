<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 * @property int id
 */
class Author extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'avatar', 'about'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
