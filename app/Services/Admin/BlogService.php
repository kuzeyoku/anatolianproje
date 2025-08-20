<?php

namespace App\Services\Admin;

use App\Models\Blog;
use App\Models\Category;
use App\Enums\ModuleEnum;
use App\Services\CacheService;

class BlogService extends BaseService
{
    public function __construct(Blog $blog)
    {
        parent::__construct($blog, ModuleEnum::Blog);
    }

    public function getCategories(string $locale = null): array
    {
        $locale ??= session("active_locale", app()->getFallbackLocale());
        return CacheService::remember(ModuleEnum::Blog->value . "_categories_{$locale}", function () use ($locale) {
            return Category::active()->module(ModuleEnum::Blog)
                ->get()
                ->pluck("titles.{$locale}", "id")
                ->toArray();
        });
    }
}
