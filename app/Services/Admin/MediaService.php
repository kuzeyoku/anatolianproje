<?php

namespace App\Services\Admin;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;

class MediaService
{
    public function handleUploads(HasMedia $item, array $files)
    {
        if (isset($files["image"])) {
            $this->validateFile($files["image"]);
            $this->clearMedia($item);
            $this->addMedia($item, $files["image"]);
        }

        if (isset($files["document"])) {
            $this->validateFile($files["document"]);
            $this->clearMedia($item, "document");
            $this->addMedia($item, $files["document"], "document");
        }

        if (isset($files["documents"])) {
            foreach ($files["documents"] as $document) {
                $this->validateFile($document);
                $this->addMedia($item, $document, "documents");
            }
        }

        if (isset($files["gallery"])) {
            $gallery = is_array($files["gallery"]) ? $files["gallery"] : [$files["gallery"]];
            foreach ($gallery as $image) {
                $this->validateFile($image);
                $this->addMedia($item, $image, "gallery");
            }
        }
    }

    public function addMedia(HasMedia $item, UploadedFile $file, string $collection = "default")
    {
        $fileName = self::generateFileName($file);
        try {
            $item->addMedia($file)->usingFileName($fileName)->toMediaCollection($collection);
        } catch (Exception $e) {
            throw new Exception("Beklenmedik Bir Hata Meydana Geldi");
        }
    }

    public function clearMedia(HasMedia $item, string $collection = "default")
    {
        if ($item->getMedia($collection)->isEmpty())
            throw new Exception("Silinecek Dosya Bulunamadı");
        $item->clearMediaCollection($collection);
    }

    private function validateFile($file): void
    {
        throw_if(!$file instanceof UploadedFile || !$file->isValid(), Exception::class, "Dosya Doğrulanamadı");
    }

    private function generateFileName(UploadedFile $file): string
    {
        $timestamp = now()->format("YmdHis");
        $random = Str::random(8);
        $extension = $file->extension();

        return "{$timestamp}_{$random}.{$extension}";
    }

}