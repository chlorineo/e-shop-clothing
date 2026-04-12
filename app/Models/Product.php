<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }

    /**
     * @return BelongsToMany<Tag, $this>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return HasMany<ProductImage, $this>
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('position')->orderBy('id');
    }

    /**
     * Limit the query to products that contain every tag in the given list.
     *
     * @param  Builder<Product>  $query
     * @param  list<string>  $tagNames
     * @return Builder<Product>
     */
    public function scopeWithAllTags(Builder $query, array $tagNames): Builder
    {
        $tagNames = array_values(array_unique($tagNames));

        if ($tagNames === []) {
            return $query;
        }

        foreach ($tagNames as $tagName) {
            $query->whereHas('tags', function (Builder $tagQuery) use ($tagName): void {
                $tagQuery->where('tags.name', $tagName);
            });
        }

        return $query;
    }

    /**
     * Limit the query to products whose price falls within the given range.
     *
     * @param  Builder<Product>  $query
     * @return Builder<Product>
     */
    public function scopeWithinPriceRange(Builder $query, float $minimumPrice, float $maximumPrice): Builder
    {
        return $query->whereBetween('price', [$minimumPrice, $maximumPrice]);
    }

    /**
     * Limit the query to products whose name matches the given search text.
     *
     * @param  Builder<Product>  $query
     * @return Builder<Product>
     */
    public function scopeMatchingSearch(Builder $query, ?string $searchText): Builder
    {
        $searchText = $searchText !== null ? trim($searchText) : null;

        if ($searchText === null || $searchText === '') {
            return $query;
        }

        return $query->where('name', 'like', '%'.$searchText.'%');
    }
}
