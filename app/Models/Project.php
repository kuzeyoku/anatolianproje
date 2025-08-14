<?php

namespace App\Models;

use App\Enums\ModuleEnum;
use App\Traits\HasCategory;
use App\Traits\HasModule;
use App\Traits\HasTranslations;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends BaseModel implements HasMedia
{
    use HasCategory;
    use HasModule;
    use HasTranslations;
    use InteractsWithMedia;

    protected $translationModel = ProjectTranslate::class;

    protected $categoryModel = Category::class;

    protected $translationForeignKey = 'project_id';

    protected $categoryModelForeignKey = 'project_id';

    protected $module = ModuleEnum::Project;

    protected $fillable = [
        'slug',
        'category_id',
        'video',
        'model3D',
        'order',
        'status',
    ];

    protected mixed $locale;

    protected $with = ['translate', 'category'];

    public function __construct()
    {
        parent::__construct();
        $this->locale = session('locale');
    }

    public function getFeaturesAttribute(): array
    {
        return $this->translate->pluck('features', 'lang')->toArray();
    }

    public function getFeatureAttribute(): array
    {
        $result = [];
        if (array_key_exists($this->locale, $this->features)) {
            $featuresLine = array_filter(explode("\r\n", $this->features[$this->locale]), function ($item) {
                return ! empty($item);
            });
            array_map(function ($item) use (&$result) {
                [$key, $value] = explode(':', $item);
                $result[$key] = $value;
            }, $featuresLine);
        }

        return $result;
    }

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = Str::slug(request('title.'.app()->getFallbackLocale()));
        });
    }
}
