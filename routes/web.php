<?php

use App\Http\Controllers\{ProfileController, HomeController, UserController, BlogController, ProgramsController, CoursesController, CourseAllocationController, CourseNotesController};
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

    Route::prefix('programs')->group(function () {
        Route::get('/', [ProgramsController::class, 'index'])->name('program.index');
        Route::get('/create', [ProgramsController::class, 'create'])->name('program.create');
        Route::post('/store', [ProgramsController::class, 'store'])->name('program.store');
        Route::get('/edit/{slug}', [ProgramsController::class, 'edit'])->name('program.edit');
        Route::post('/update/{slug}', [ProgramsController::class, 'update'])->name('program.update');
        Route::get('/delete/{slug}', [ProgramsController::class, 'destroy'])->name('program.delete');
        Route::get('/restore/{slug}', [ProgramsController::class, 'restore'])->name('program.restore');
        Route::post('/validate-program-name', [ProgramsController::class, 'checkProgramName'])->name('check.program.name');
        Route::get('/courses/{slug}', [ProgramsController::class, 'show'])->name('program.courses');
    });


    Route::prefix('courses')->group(function () {
        Route::get('/', [CoursesController::class, 'index'])->name('course.index');
        Route::get('/create', [CoursesController::class, 'create'])->name('course.create');
        Route::post('/store', [CoursesController::class, 'store'])->name('course.store');
        Route::get('/edit/{slug}', [CoursesController::class, 'edit'])->name('course.edit');
        Route::post('/update/{slug}', [CoursesController::class, 'update'])->name('course.update');
        Route::get('/delete/{slug}', [CoursesController::class, 'destroy'])->name('course.delete');
        Route::get('/details/{slug}', [CoursesController::class, 'show'])->name('course.show');
        Route::post('/validate-course-name', [CoursesController::class, 'checkCourseName'])->name('check.course.name');

    });

    Route::prefix('course-notes')->group(function () {
        Route::get('{courseSlug}', [CourseNotesController::class, 'index'])->name('course.note.index');
        Route::get('create/{courseSlug}/{allocationSlug}', action: [CourseNotesController::class, 'create'])->name('note.create');
        Route::post('store', [CourseNotesController::class, 'store'])->name('note.store');
        // Route::get('edit/{note_slug}', [CourseNotesController::class, 'edit'])->name('course.note.edit');
        // Route::post('update/{note_slug}', [CourseNotesController::class, 'update'])->name('course.note.update');
        // Route::get('students/{slug}', [CourseNotesController::class, 'student'])->name('course.note.student');
        // Route::get('view/{slug}/{note_slug}', [CourseNotesController::class, 'read'])->name('course.note.read');
        // Route::get('reading/{slug}/{action}/{note_slug}/{id}', [CourseNotesController::class, 'reading'])->name('course.note.reading');
        // Route::get('student/{user_id}/{slug}/{subscription_id}/{allocation_id}', [CourseNotesController::class, 'noting'])->name('course.student.note');
        // Route::get('post/{user_id}/{slug}/{subscription_id}/{allocation_id}/{instructor_id}', [CourseLibraryController::class, 'postNote'])->name('course.post.note');
        // Route::get('un-post/{library_id}', [CourseLibraryController::class, 'unpostNote'])->name('course.unpostNote.note');
        // Route::get('{action}/{note_slug}', [CourseNotesController::class, 'action'])->name('course.note.action');
        // Route::get('delete/{note_slug}', [CourseNotesController::class, 'destroy'])->name('note.delete');
    });


    Route::prefix('course-allocations')->group(function () {
        Route::get('/', [CourseAllocationController::class, 'index'])->name('allocation.index');
        Route::post('/create', [CourseAllocationController::class, 'store'])->name('allocation.store');
        Route::get('/view/{slug}', [CourseAllocationController::class, 'show'])->name('allocation.view');
        Route::post('/update/{slug}', [CourseAllocationController::class, 'update'])->name('allocation.update');
        Route::get('/delete/{slug}', [CourseAllocationController::class, 'destroy'])->name('allocation.delete');
    });
    Route::get('/signout', [HomeController::class, 'logout'])->name('signout');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
