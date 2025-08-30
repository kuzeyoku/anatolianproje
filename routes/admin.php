<?php

use Illuminate\Support\Facades\Route;
use App\Enums\ModuleEnum;
use App\Http\Middleware\Admin;
use App\Http\Controllers\Admin\{
    AuthController,
    HomeController,
    SettingController,
    MediaController,
    MessageController,
    MenuController,
    PageController,
    UserController,
    LanguageController,
    CategoryController,
    SectorController,
    ServiceController,
    ProjectController,
    ProductController,
    SliderController,
    BrandController,
    ReferenceController,
    TestimonialController,
    PopupController,
    BlogController,
    EditorController,
    NotificationController
};

// Config üzerinden almak daha iyi
$adminPrefix = config('system.admin_route', 'admin');

Route::prefix($adminPrefix)->name('admin.')->group(function () {
    // Auth routes
    Route::prefix('auth')->controller(AuthController::class)->name("auth.")->group(function () {
        Route::get('login', 'login')->name('login');
        Route::get('forgot-password', 'forgot_password_view')->name('forgot_password_view');
        Route::post('forgot-password', 'forgot_password')->name('forgot_password');
        Route::get('reset-password/{token}', 'reset_password_view')->name('reset_password_view');
        Route::post('reset-password', 'reset_password')->name('reset_password');
        Route::post('authenticate', 'authenticate')->name('authenticate');
    });

    Route::middleware(['auth', Admin::class])->group(function () {
        // Dashboard & logout
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

        // Settings
        Route::prefix('settings')->controller(SettingController::class)->group(function () {
            Route::get('/{category}', 'index')->name('settings');
            Route::put('/update', 'update')->name('settings.update');
        });

        // Resource-based modules
        Route::resources([
            ModuleEnum::Menu->route() => MenuController::class,
            ModuleEnum::Page->route() => PageController::class,
            ModuleEnum::User->route() => UserController::class,
            ModuleEnum::Language->route() => LanguageController::class,
            ModuleEnum::Category->route() => CategoryController::class,
            ModuleEnum::Sector->route() => SectorController::class,
            ModuleEnum::Service->route() => ServiceController::class,
            ModuleEnum::Project->route() => ProjectController::class,
            ModuleEnum::Product->route() => ProductController::class,
            ModuleEnum::Slider->route() => SliderController::class,
            ModuleEnum::Brand->route() => BrandController::class,
            ModuleEnum::Reference->route() => ReferenceController::class,
            ModuleEnum::Testimonial->route() => TestimonialController::class,
            ModuleEnum::Popup->route() => PopupController::class,
            ModuleEnum::Blog->route() => BlogController::class,
            ModuleEnum::Message->route() => MessageController::class,
        ]);

        // Blog specific routes
        Route::prefix(ModuleEnum::Blog->route())->controller(BlogController::class)->name(ModuleEnum::Blog->routeName())->group(function () {
            Route::put('/{blog}/status-update', 'statusUpdate')->name('status_update');
            Route::get('/{blog}/comment', 'comment')->name('comment');
            Route::put('/comment/{comment}/status', 'commentStatusChange')->name('comment_status_change');
            Route::delete('/comment/{comment}', 'comment_delete')->name('comment_delete');
        });

        Route::prefix(ModuleEnum::Page->route())->controller(PageController::class)->name(ModuleEnum::Page->routeName())->group(function () {
            Route::put("/{page}/status-update", "statusUpdate")->name("status_update");
        });

        Route::prefix(ModuleEnum::Service->route())->controller(ServiceController::class)->name(ModuleEnum::Service->routeName())->group(function () {
            Route::put('/{service}/status-update', "statusUpdate")->name("status_update");
        });

        Route::prefix(ModuleEnum::Reference->route())->controller(ReferenceController::class)->name(ModuleEnum::Reference->routeName())->group(function () {
            Route::put('/{reference}/status-update', "statusUpdate")->name("status_update");
        });

        Route::prefix(ModuleEnum::Slider->route())->controller(SliderController::class)->name(ModuleEnum::Slider->routeName())->group(function () {
            Route::put('/{slider}/status-update', "statusUpdate")->name("status_update");
        });

        Route::prefix(ModuleEnum::Category->route())->controller(CategoryController::class)->name(ModuleEnum::Category->routeName())->group(function () {
            Route::put('/{category}/status-update', "statusUpdate")->name("status_update");
        });

        Route::prefix('media')->controller(MediaController::class)->name("media.")->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/upload', 'store')->name(name: 'upload');
            Route::delete('/{media}', 'destroy')->name('destroy');
        });

        Route::prefix(ModuleEnum::Project->route())->controller(ProjectController::class)->name(ModuleEnum::Project->routeName())->group(function () {
            Route::put('/{project}/status-update', "statusUpdate")->name("status_update");
            Route::post("/{project}/image-upload", "storeImage")->name("storeImage");
            Route::delete('/{project}/all-media-clear', "destroyAllImages")->name("destroyAllImages");
            Route::get("/{project}/image", "image")->name("image");
        });

        Route::prefix(ModuleEnum::Message->route())->controller(MessageController::class)->name(ModuleEnum::Message->routeName())->group(function () {
            Route::get('/{message}/reply', 'reply')->name('reply');
            Route::post('/{message}/sendReply', 'sendReply')->name('sendReply');
            Route::post('/{message}/block', 'block')->name('block');
            Route::get('/user/blocked', 'blocked')->name('blocked');
            Route::delete('/user/{id}/unblock', 'unblock')->name('unblock');
        });

        // Notification Management
        Route::prefix('notifications')->controller(NotificationController::class)->name('notifications.')->group(function () {
            Route::get('/{id}/read', 'read')->name('read');
            Route::get('/mark-all-as-read', 'markAllAsRead')->name('mark_all_as_read');
        });

        // Editor & File Upload
        Route::prefix('editor')->controller(EditorController::class)->group(function () {
            Route::post('/upload', 'store')->name('editor.upload');
        });

        // System Management
        Route::prefix('system')->controller(HomeController::class)->name('system.')->group(function () {
            Route::get('/cache-clear', 'cacheClear')->name('cache_clear');
            Route::post('/clear-visitor-counter', 'clearVisitorCounter')->name('clear_visitor_counter');
        });
    });
});