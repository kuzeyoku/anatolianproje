<?php

namespace App\Services\Admin;

use Illuminate\Support\Str;

class MediaService
{
    public function clearMedia($item, $collection = "default")
    {
        return $item->clearMediaCollection($collection);

    }
    public function handleUploads($item, $files)
    {
        if (array_key_exists('image', $files) && $files['image']->isValid()) {
            $this->clearMedia($item);
            $this->addMedia($item, $files, "image");
        }
        if (array_key_exists('document', $files) && $files['document']->isValid()) {
            $this->clearMedia($item, "documents");
            $this->addMedia($item, $files, "document", "documents");
        }
    }

    public function addMedia($item, $data, $input, $collection = "default")
    {
        $item->addMedia($data[$input])->usingFileName(Str::random(8) . "." . $data[$input]->extension())->toMediaCollection($collection);
    }
}