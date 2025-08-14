<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Product;

class ProductService extends BaseService
{
    public function __construct(Product $product)
    {
        parent::__construct($product, ModuleEnum::Product);
    }
}
