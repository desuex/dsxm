<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
    ];

    protected $casts = [
        'meta_keywords' => 'array',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }


}
