<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ModuleEnum;
use App\Http\Requests\GeneralStatusRequest;
use App\Http\Requests\Project\ImageProjectRequest;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use App\Services\Admin\ProjectService;
use Exception;
use Illuminate\Support\Facades\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Throwable;
use App\Services\Admin\MediaService;

class ProjectController extends Controller
{
    public function __construct(private readonly ProjectService $service)
    {
        View::share([
            'categories' => $service->getCategories(),
            'route' => $service->route(),
            'folder' => $service->folder(),
            'module' => ModuleEnum::Service,
        ]);
    }

    public function index()
    {
        $items = $this->service->getAll();

        return view(themeView('admin', "{$this->service->folder()}.index"), compact('items'));
    }

    public function image(Project $project)
    {
        return view(themeView("admin", "{$this->service->folder()}.image"), compact('project'));
    }

    public function storeImage(ImageProjectRequest $request, Project $project): object
    {
        try {
            $this->service->imageUpload($request->validated(), $project);
            return (object) [
                "message" => __("admin/general.success")
            ];
        } catch (Throwable $e) {
            return (object) [
                "message" => __("admin/general.error")
            ];
        }
    }

    public function destroyAllImages(Project $project)
    {
        try {
            app(MediaService::class)->clearMedia($project, "gallery");
            return back()->with("success", __("admin/alert.default_success"));
        } catch (Exception $e) {
            return back()->with("error", $e->getMessage());
        }
    }

    public function create()
    {
        return view(themeView('admin', "{$this->service->folder()}.create"));
    }

    public function store(StoreProjectRequest $request)
    {
        try {
            $this->service->create($request->validated());

            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->with('success', __('admin/alert.default_success'));
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->with('error', __('admin/alert.default_error'));
        }
    }

    public function edit(Project $project)
    {
        return view(themeView('admin', "{$this->service->folder()}.edit"), compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        try {
            $this->service->update($request->validated(), $project);

            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->with('success', __('admin/alert.default_success'));
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->with('error', __('admin/alert.default_error'));
        }
    }

    public function statusUpdate(GeneralStatusRequest $request, Project $project)
    {
        try {
            $this->service->statusUpdate($request->validated(), $project);

            return back()
                ->with('success', __('admin/alert.default_success'));
        } catch (Throwable $e) {
            return back()
                ->with('error', __('admin/alert.default_error'));
        }
    }

    public function destroy(Project $project)
    {
        try {
            $this->service->delete($project);

            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->with('success', __('admin/alert.default_success'));
        } catch (Throwable $e) {
            return back()
                ->with('error', __('admin/alert.default_error'));
        }
    }
}
