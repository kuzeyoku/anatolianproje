<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Enums\ModuleEnum;
use App\Services\Admin\BaseService;
use Illuminate\Support\Facades\Cache;

class ProductService extends BaseService
{
    public function __construct(Product $product)
    {
        parent::__construct($product, ModuleEnum::Product);
    }

    public function getCategories(string $locale = null): array
    {
        $locale ??= session("active_locale", app()->getFallbackLocale());
        return Cache::remember(ModuleEnum::Product->value . "_categories_{$locale}", setting("cache", "time"), function () use ($locale) {
            return Category::active()->module(ModuleEnum::Product)
                ->get()
                ->pluck("titles.{$locale}", "id")
                ->toArray();
        });
    }
}
