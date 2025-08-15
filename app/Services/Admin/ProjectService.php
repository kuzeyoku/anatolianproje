<?php

namespace App\Services\Admin;

use App\Models\Project;
use App\Models\Category;
use App\Enums\ModuleEnum;
use Illuminate\Support\Facades\Cache;

class ProjectService extends BaseService
{
    public function __construct(Project $project)
    {
        parent::__construct($project, ModuleEnum::Project);
    }

        public function getCategories(string $locale = null): array
    {
        $locale ??= session("active_locale", app()->getFallbackLocale());
        return Cache::remember(ModuleEnum::Project->value . "_categories_{$locale}", setting("cache", "time"), function () use ($locale) {
            return Category::active()->module(ModuleEnum::Project)
                ->get()
                ->pluck("titles.{$locale}", "id")
                ->toArray();
        });
    }
}
