<?php

namespace App\Services\Admin;

use App\Models\Blog;
use App\Models\Category;
use App\Enums\ModuleEnum;
use Illuminate\Support\Facades\Cache;

class BlogService extends BaseService
{
    public function __construct(Blog $blog)
    {
        parent::__construct($blog, ModuleEnum::Blog);
    }

    public function getCategories(string $locale = null): array
    {
        $locale ??= session("active_locale", app()->getFallbackLocale());
        return Cache::remember(ModuleEnum::Blog->value . "_categories_{$locale}", setting("cache", "time"), function () use ($locale) {
            return Category::active()->module(ModuleEnum::Blog)
                ->get()
                ->pluck("titles.{$locale}", "id")
                ->toArray();
        });
    }
}
