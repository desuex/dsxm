<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'short_description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
    ];

    protected $casts = [
        'meta_keywords' => 'array',
    ];


    // A chain belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // A chain has many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
