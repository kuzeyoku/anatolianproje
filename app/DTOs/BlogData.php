<?php

namespace App\DTOs;
class BlogData
{
    public function __construct(
        public ?array $title,
        public ?array $description,
        public ?array $tags,

    ) {
    }
}