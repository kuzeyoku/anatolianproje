<?php
namespace App\Services\Admin;
class TranslationService
{
    public function sync($item, $data)
    {
        if (method_exists($item, 'translate')) {
            languageList()->each(function ($lang) use ($item, $data) {
                $item->translate()->updateOrCreate(
                    [
                        'lang' => $lang->code,
                    ],
                    [
                        'title' => array_key_exists('title', $data) ? $data['title'][$lang->code] : null,
                        'description' => array_key_exists('description', $data) ? $data['description'][$lang->code] : null,
                        'tags' => array_key_exists('tags', $data) ? $data['tags'][$lang->code] : null,
                        'features' => array_key_exists('features', $data) ? $data['features'][$lang->code] : null,
                    ]
                );
            });
        }
    }
}