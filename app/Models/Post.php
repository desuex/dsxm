<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'publication_date',
        'slug',
        'preview',
        'text',
        'is_published',
        'views_count',
        'category_id',
        'chain_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'views_count' => 'integer',
        'meta_keywords' => 'array',
        'publication_date' => 'datetime',
    ];

    // A post belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // A post belongs to a chain (optional)
    public function chain()
    {
        return $this->belongsTo(Chain::class);
    }

    // A post belongs to many tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function incrementViews()
    {
        $this->increment('views_count');
    }

    public function isPublished(): bool
    {
        return $this->is_published;
    }

    public function formattedPublicationDate()
    {
        return $this->publication_date ? $this->publication_date->format('M d, Y') : 'Not Published';
    }

}
