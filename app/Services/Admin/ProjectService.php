<?php

namespace App\Services\Admin;

use App\Models\Project;
use App\Models\Category;
use App\Enums\ModuleEnum;
use App\Services\CacheService;

class ProjectService extends BaseService
{
    public function __construct(Project $project)
    {
        parent::__construct($project, ModuleEnum::Project);
    }

    public function getCategories(string $locale = null): array
    {
        $locale ??= session("active_locale", app()->getFallbackLocale());
        return CacheService::remember(ModuleEnum::Project->value . "_categories_{$locale}", function () use ($locale) {
            return Category::active()->module(ModuleEnum::Project)
                ->get()
                ->pluck("titles.{$locale}", "id")
                ->toArray();
        });
    }
}
