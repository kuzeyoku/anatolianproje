<?php

namespace App\Services;

use App\Enums\StatusEnum;
use Illuminate\Support\Facades\Cache;

class CacheService
{
    public static function isActive(): bool
    {
        return setting('cache', 'status', StatusEnum::Passive->value) == StatusEnum::Active->value;
    }

    public static function cacheTime(): int
    {
        return setting("cache", "time", 60 * 60);
    }

    public static function cacheQuery(string $cacheKey, callable $query)
    {
        return self::isActive()
            ? Cache::remember($cacheKey . '_' . app()->getLocale(), setting("cache", "time"), $query)
            : $query();
    }
}
