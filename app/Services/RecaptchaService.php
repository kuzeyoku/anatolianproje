<?php

namespace App\Services;
use Exception;
use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecaptchaService
{

    private const VERIFY_URL = "https://www.google.com/recaptcha/api/siteverify";
    public static function isActive(): bool
    {
        return SettingService::get("integration", "recaptcha_status", StatusEnum::Passive->value) === StatusEnum::Active->value;
    }

    public static function validation(Request|array $request): bool
    {
        if (!self::isActive())
            return true;

        $token = is_array($request) ? $request["g-recaptcha-response"] ?? null : $request->{"g-recaptcha-response"};

        if (empty($token))
            return false;

        $secretKey = SettingService::get("integration", "recaptcha_secret_key");
        if (!$secretKey)
            return false;
        try {
            $response = Http::timeout(10)->asForm()->post(self::VERIFY_URL, [
                "secret" => $secretKey,
                "response" => $token,
                "remoteip" => request()->ip()
            ]);

            if (!$response->successful())
                return false;

            $data = $response->json();
            $minScore = SettingService::get("integration", "recaptcha_min_score", 0.5);
            return $data["success"] && $data["score"] >= $minScore;
        } catch (Exception) {
            return false;
        }
    }

    public static function getSiteKey(): ?string
    {
        return self::isActive()
            ? SettingService::get("integration", "recaptcha_site_key")
            : null;
    }

    public static function renderScript(): string
    {
        if (!self::isActive()) {
            return '';
        }

        $siteKey = self::getSiteKey();
        if (empty($siteKey)) {
            return '';
        }

        return '<script src="https://www.google.com/recaptcha/api.js?render=' . $siteKey . '"></script>';
    }
}