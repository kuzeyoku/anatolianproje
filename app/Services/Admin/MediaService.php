<?php

namespace App\Services\Admin;

class MediaService
{
    public function handleUploads($item, $request): void
    {
        if (array_key_exists('image', $request) && $request['image']->isValid()) {
            $fileService = new FileService('image', $request);
            $fileService->upload($item);
        }
        if (array_key_exists('document', $request) && $request['document']->isValid()) {
            $fileService = new FileService('document', $request, 'document');
            $fileService->upload($item);
        }
    }
}