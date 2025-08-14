<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Service;

class ServiceService extends BaseService
{
    public function __construct(Service $service)
    {
        parent::__construct($service, ModuleEnum::Service);
    }
}
