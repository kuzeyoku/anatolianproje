<?php

namespace App\Enums;

enum PageTypeEnum: string
{
    case Cookie = "cookie_policy";
    case Privacy = "privacy_policy";
    case Terms = "terms_of_service";
    case KVKK = "kvkk";

    public static function getValues(): array
    {
        return [
            self::Cookie->value,
            self::Privacy->value,
            self::Terms->value,
            self::KVKK->value
        ];
    }

}