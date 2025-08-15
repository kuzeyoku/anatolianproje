<?php

namespace App\Services\Front;

use App\Enums\StatusEnum;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    public static function getAll(): Collection
    {
        return Cache::remember('settings', setting("cache", "time"), function () {
            return Setting::all();
        });
    }

    public static function get($category, $key)
    {
        return Cache::remember("setting.{$category}.{$key}", setting("cache", "time"), function () use ($key, $category) {
            return self::getAll()->firstWhere(['category' => $category, 'key' => $key])?->value;
        });
    }

    public static function toArray(): array
    {
        return Cache::remember('settings.array', setting("cache", "time"), function () {
            return self::getAll()
                ->groupBy('category')
                ->map(function ($group) {
                    if ($group->first()->category === 'asset') {
                        return $group->mapWithKeys(function ($setting) {
                            return [$setting->key => $setting->getFirstMediaUrl()];
                        });
                    }

                    return $group->pluck('value', 'key');
                })
                ->toArray();
        });
    }

    public static function getCacheTime()
    {
        return Cache::remember('setting.cache.time', setting("cache", "time"), function () {
            return setting("cache", "time", 60 * 60);
        });
    }

    public static function cacheIsActive(): bool
    {
        return self::isActive("cache");
    }

    public static function recaptchaIsActive(): bool
    {
        return self::isActive("recaptcha");
    }

    public static function isActive(string $category): bool
    {
        return setting($category, "status", StatusEnum::Passive->value) == StatusEnum::Active->value;
    }
}
