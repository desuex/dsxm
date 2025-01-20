<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    /**
     * Get or create a tag by name.
     *
     * @param string $name The tag name.
     * @return static
     */
    public static function getOrCreateByName(string $name): self
    {
        $slug = Str::slug($name);

        return self::firstOrCreate(
            ['slug' => $slug],
            ['name' => $name]
        );
    }
}
