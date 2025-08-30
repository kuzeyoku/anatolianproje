<?php

namespace App\Services\Admin;

use App\Models\Project;
use App\Enums\ModuleEnum;

class ProjectService extends BaseService
{
    public function __construct(Project $project)
    {
        parent::__construct($project, ModuleEnum::Project);
    }

    public function getCategories($arr = false)
    {
        return CategoryService::getModuleCategories(ModuleEnum::Project, $arr);
    }
}
