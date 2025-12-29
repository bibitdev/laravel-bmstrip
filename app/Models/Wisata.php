<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{

    protected $table = 'wisatas';

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'image',
        'description',
        'location',
        'price',
        'published',
    ];

    /**
     * Wisata belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Wisata has many reviews.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Calculate average rating for this wisata.
     */
    public function averageRating(): float
    {
        return (float) $this->reviews()->avg('rating') ?? 0;
    }
}
