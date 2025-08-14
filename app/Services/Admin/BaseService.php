<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    protected TranslationService $translationService;
    protected MediaService $mediaService;
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

    public function getAll()
    {
        return $this->model->orderBy('id', 'DESC')->paginate(setting('pagination', 'admin'));
    }

    public function create(array $request): void
    {
        $item = $this->model->create($request);
        $this->translationService->sync($item, $request);
        $this->mediaService->handleUploads($item, $request);
    }

    public function update(array $request, Model $item): void
    {
        $item->update($request);
        $this->translationService->sync($item, $request);
        $this->mediaService->handleUploads($item, $request);
    }


    public function statusUpdate($request, Model $item): bool
    {
        return $item->update($request);
    }

    public function delete(Model $item): ?bool
    {
        return $item->delete();
    }

    public function imageDelete(Model $item): ?bool
    {
        return $item->delete();
    }

    public function imageAllDelete(Model $item)
    {
        return $item->clearMediaCollection('images');
    }

    public function getCategories(): array
    {
        return Category::active()->module($this->module)->get()->pluck('titles.' . app()->getFallbackLocale(), 'id')->toArray();
    }
}
