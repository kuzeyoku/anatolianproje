<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Enums\ModuleEnum;
use App\Services\SeoService;
use App\Services\CacheService;
use App\Services\Admin\ProjectService;

class ProjectController extends Controller
{
    public function index()
    {
        SeoService::module(ModuleEnum::Project);
        $cacheKey = ModuleEnum::Project->value . '_index_' . request()->get("page", 1);
        $categories = app(ProjectService::class)->getCategories();
        $projects = CacheService::cacheQuery($cacheKey, fn() => Project::active()->order()->get());

        return view('project.index', compact('projects', "categories"));
    }

    public function show(Project $project)
    {
        SeoService::show($project);
        $cacheKey = ModuleEnum::Product->value . '_' . $project->id . '_other';
        $otherProjects = CacheService::cacheQuery($cacheKey, fn() => Project::whereKeyNot($project->id)->active()->get());

        return view('project.show', compact('project', 'otherProjects'));
    }
}
