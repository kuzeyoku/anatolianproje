<?php

namespace App\Models;

use App\Enums\ModuleEnum;
use App\Traits\HasModule;
use Illuminate\Support\Str;
use App\Traits\HasTranslations;

class Page extends BaseModel
{
    use HasTranslations;
    use HasModule;
    protected $translationModel = PageTranslate::class;
    protected $translationForeignKey = "page_id";
    protected $module = ModuleEnum::Page;
    protected $fillable = [
        'slug',
        'status',
        "quick_link",
    ];

    protected $with = ["translate"];

    public static function toSelectArray(): array
    {
        return self::active()->get()->pluck("title", "id")->all();
    }

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = Str::slug(request("title." . app()->getFallbackLocale()));
        });
    }
}
