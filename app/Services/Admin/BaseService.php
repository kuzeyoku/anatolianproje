<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    private TranslationService $translationService;
    private MediaService $mediaService;
    public function __construct(private readonly Model $model, private readonly ModuleEnum $module)
    {
        $this->translationService = app(TranslationService::class);
        $this->mediaService = app(MediaService::class);
    }

    public function folder(): string
    {
        return $this->module->folder();
    }

    public function route(): string
    {
        return $this->module->route();
    }

    public function getAll(int $perPage = null)
    {
        $perPage ??= setting('pagination', 'admin');
        return $this->model->orderByDesc('id')->paginate($perPage);
    }

    public function create(array $data): Model
    {
        $item = $this->model->create($data);
        $this->translationService->sync($item, $data);
        $this->mediaService->handleUploads($item, $data);
        return $item;
    }

    public function update(array $data, Model $item): Model
    {
        $item->update($data);
        $this->translationService->sync($item, $data);
        $this->mediaService->handleUploads($item, $data);
        return $item;
    }

    public function statusUpdate(array $data, Model $item): bool
    {
        return $item->update($data);
    }

    public function delete(Model $item): ?bool
    {
        $this->mediaService->clearMedia($item);
        return $item->delete();
    }
}
