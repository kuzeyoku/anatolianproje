<?php

namespace App\Services\Admin;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;

class MediaService
{
    public function clearMedia(HasMedia $item, string $collection = "default")
    {
        $item->clearMediaCollection($collection);

    }
    public function handleUploads(HasMedia $item, array $files)
    {
        if (isset($files["image"]) && $files["image"] instanceof UploadedFile && $files["image"]->isValid()) {
            $this->clearMedia($item);
            $this->addMedia($item, $files["image"]);
        }

        if (isset($files["documents"])) {
            foreach ($files["documents"] as $document) {
                if ($document instanceof UploadedFile && $document->isValid()) {
                    $this->addMedia($item, $document, "documents");
                }
            }
        }

        if (isset($files["gallery"])) {
            foreach ($files["gallery"] as $image) {
                if ($image instanceof UploadedFile && $image->isValid()) {
                    $this->addMedia($item, $image, "gallery");
                }
            }
        }
    }

    public function addMedia(HasMedia $item, UploadedFile $file, string $collection = "default")
    {
        $fileName = self::generateFileName($file);
        $item->addMedia($file)->usingFileName($fileName)->toMediaCollection($collection);
    }

    public function generateFileName(UploadedFile $file): string
    {
        $timestamp = now()->format("YmdHis");
        $random = Str::random(8);
        $extension = $file->extension();

        return "{$timestamp}_{$random}.{$extension}";
    }

}