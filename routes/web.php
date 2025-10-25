<?php

use App\Http\Controllers\{ProfileController, HomeController, UserController, BlogController, CoursesController, CourseAllocationController};
use Illuminate\Support\Facades\Route;

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Session::forget('cart');
    return redirect()->back()->with([
        'success' => "All Application cache flushed successfully",
    ]);
});
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/email/resend', [VerificationController::class, 'resend']);
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:web','verified']], function() {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::group(["prefix" => "users"], function () {
       
        Route::get("/", [UserController::class, 'index'])->name("user.index");
        Route::get("/create",[UserController::class, "create"])->name("user.create");
        Route::get("/{slug}",[UserController::class, "show"])->name("user.show");
        Route::post("/store",[UserController::class, "store"])->name("user.store");
        Route::get("/edit/{slug}", [UserController::class, "edit"])->name("user.edit");
        Route::post("/update/{slug}", [UserController::class, "update"])->name("user.update");
        Route::post('/check-email', [UserController::class, 'checkEmail'])->name('check.email');
        Route::post('/check-phone', [UserController::class, 'checkPhone'])->name('check.phone');
       
        Route::group(["prefix" => "Action"], function () {
            Route::post("/change-Password/{slug}", [UserController::class, "changingPassword"])->name("changingPassword");
            Route::get("/suspend/{slug}", [UserController::class, "suspend"])->name("user.suspend");
            Route::get("/un-suspend/{slug}",[UserController::class, "unsuspend"])->name("user.unsuspend");
        });
    });

    Route::prefix('blogs')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/save', [BlogController::class, 'store'])->name('blog.store');
        Route::post('/update/{blog_id}', [BlogController::class, 'update'])->name('blog.update');
        Route::get('/edit/{blog_id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::get('/delete/{blog_id}', [BlogController::class, 'destroy'])->name('blog.delete');
        Route::get('/details/{eve_id}', [BlogController::class, 'show'])->name('blog.show');
    });

    Route::prefix('courses')->group(function () {
        Route::get('/', [CoursesController::class, 'index'])->name('course.index');
        Route::get('/create', [CoursesController::class, 'create'])->name('course.create');
        Route::post('/store', [CoursesController::class, 'store'])->name('course.store');
        Route::get('/edit/{course_id}', [CoursesController::class, 'edit'])->name('course.edit');
        Route::post('/update/{course_id}', [CoursesController::class, 'update'])->name('course.update');
        Route::get('/delete/{course_id}', [CoursesController::class, 'destroy'])->name('course.delete');
        Route::get('/details/{course_id}', [CoursesController::class, 'show'])->name('course.show');
    });

    Route::prefix('course-allocations')->group(function () {
        Route::get('/', [CourseAllocationController::class, 'index'])->name('allocation.index');
        Route::post('/create', [CourseAllocationController::class, 'store'])->name('allocation.store');
        Route::get('/edit/{allocation_id}', [CourseAllocationController::class, 'edit'])->name('allocation.edit');
        Route::post('/update/{allocation_id}', [CourseAllocationController::class, 'update'])->name('allocation.update');
        Route::get('/delete/{allocation_id}', [CourseAllocationController::class, 'destroy'])->name('allocation.delete');
    });
    Route::get('/signout', [HomeController::class, 'logout'])->name('signout');

});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
