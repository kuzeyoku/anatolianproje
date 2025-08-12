<?php

namespace App\Traits;
use App\Models\Category;

trait HasCategory
{
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'name' => null,
            'slug' => null,
            'id' => null,
        ]);
    }

    protected function getCategoryAttributeValue($field)
    {
        return $this->category->{$field} ?? null;
    }

    public function getCategoryNameAttribute()
    {
        return $this->getCategoryAttributeValue('name');
    }
    public function getCategorySlugAttribute()
    {
        return $this->getCategoryAttributeValue('slug');
    }
}
