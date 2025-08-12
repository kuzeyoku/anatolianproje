<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Reference extends BaseModel implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        "url",
        "title",
        "status",
        "order"
    ];
}
