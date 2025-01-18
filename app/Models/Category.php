<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
    ];

    protected $casts = [
        'meta_keywords' => 'array',
    ];

    /**
     * Relationships.
     */

    // A category has many chains
    public function chains()
    {
        return $this->hasMany(Chain::class);
    }

    // A category has many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
