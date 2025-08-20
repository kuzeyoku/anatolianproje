<?php

namespace App\Services\Admin;

use App\Models\Service;
use App\Models\Category;
use App\Enums\ModuleEnum;
use App\Services\CacheService;

class ServiceService extends BaseService
{
    public function __construct(Service $service)
    {
        parent::__construct($service, ModuleEnum::Service);
    }

    public function getCategories(string $locale = null): array
    {
        $locale ??= session("active_locale", app()->getFallbackLocale());
        return CacheService::remember(ModuleEnum::Service->value . "_categories_{$locale}", function () use ($locale) {
            return Category::active()->module(ModuleEnum::Service)
                ->get()
                ->pluck("titles.{$locale}", "id")
                ->toArray();
        });
    }
}
