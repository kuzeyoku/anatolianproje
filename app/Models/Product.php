<?php

namespace App\Models;

use App\Enums\ModuleEnum;
use App\Traits\HasCategory;
use App\Traits\HasModule;
use Illuminate\Support\Str;
use App\Traits\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends BaseModel implements HasMedia
{
    use InteractsWithMedia;
    use HasTranslations;
    use HasCategory;
    use HasModule;
    protected $translationModel = ProductTranslate::class;
    protected $categoryModel = Category::class;
    protected $translationForeignKey = "product_id";
    protected $categoryModelForeignKey = "product_id";
    protected $module = ModuleEnum::Product;
    protected $fillable = [
        "status",
        "slug",
        "category_id",
        "brochure",
        "video",
        "order"
    ];

    protected $with = ["translate", "category"];

    public function getFeaturesAttribute(): array
    {
        return $this->translate->pluck("features", "lang")->all();
    }

    public function getFeatureAttribute(): array
    {
        $result = [];
        if (array_key_exists(session("locale"), $this->features)) {
            $featuresLine = array_filter(explode("\r\n", $this->features[session("locale")]), function ($item) {
                return !empty($item);
            });
            array_map(function ($item) use (&$result) {
                list($key, $value) = explode(":", $item);
                $result[$key] = $value;
            }, $featuresLine);
            return $result;
        }
        return $result;
    }
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = Str::slug(request("title." . app()->getFallbackLocale()));
        });
    }
}
