<?php

use App\Http\Controllers\{PaymentController,WebsiteController ,ProfileController, HomeController, UserController, BlogController, ProgramsController, CoursesController, CourseAllocationController, CourseNotesController, FaqController, VerificationController};
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
Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/create-account', [WebsiteController::class, 'store'])->name('createAccount');


Route::post('/Check-Email', [WebsiteController::class, 'checkEmail'])->name('Check.email');
Route::post('/Check-Phone', [WebsiteController::class, 'checkPhone'])->name('Check.phone');


Route::get('/', [WebsiteController::class, 'index'])->name('website');
Route::get('/aboutus', [WebsiteController::class, 'about'])->name('website.aboutus');
Route::get('/contactus', [WebsiteController::class, 'contact'])->name('website.contactus');
Route::get('/faq', [WebsiteController::class, 'faq'])->name('website.faq');
Route::get('/blogs', [WebsiteController::class, 'blog'])->name('website.blog');
Route::get('/partners', [WebsiteController::class, 'partners'])->name('website.partner');
Route::get('/reviews', [WebsiteController::class, 'reviews'])->name('website.review');
Route::get('/our-teams', [WebsiteController::class, 'teams'])->name('website.teams');
Route::get('/our-services', [WebsiteController::class, 'seevices'])->name('website.services');

Route::prefix('programs')->group(function () {
    Route::get('/', [WebsiteController::class, 'program'])->name('website.programs');
    Route::get('/{slug}', [WebsiteController::class, 'programShow'])->name('website.programs.show');
    Route::prefix('courses')->group(function () {
        Route::get('/{courseSlug}/{programSlug}', [WebsiteController::class, 'courseShow'])->name('website.programs.courseShow');
    });
});

Route::prefix('our-courses')->group(function () {
    Route::get('/', [WebsiteController::class, 'courses'])->name('website.courses');
    Route::get('/{courseSlug}', [WebsiteController::class, 'courseDetails'])->name('website.courseDetails');
}); 





Route::get('/email/resend', [VerificationController::class, 'resend']);
// Auth::routes(['verify' => true]);
Auth::routes();
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
        Route::get('/show/{slug}', [ProgramsController::class, 'show'])->name('program.show');
        Route::post('/update/{slug}', [ProgramsController::class, 'update'])->name('program.update');
        Route::get('/delete/{slug}', [ProgramsController::class, 'destroy'])->name('program.delete');
        Route::get('/restore/{slug}', [ProgramsController::class, 'restore'])->name('program.restore');
        Route::post('/validate-program-name', [ProgramsController::class, 'checkProgramName'])->name('check.program.name');
        Route::get('/courses/{slug}', [ProgramsController::class, 'edit'])->name('program.courses');
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

        Route::prefix('learning')->group(function () {
            Route::get('/{slug}', [CoursesController::class, 'learning'])->name('course.learning');
            Route::get('/{courseSlug}/{slug}', [CoursesController::class, 'learningShow'])->name('course.viewLearning');
           
        });
        Route::prefix('cart')->group(function () {
            Route::get('/view', [CoursesController::class, 'viewCart'])->name('cart.view');
            Route::get('/add/{slug}', [CoursesController::class, 'addToCart'])->name('cart.add');
            Route::get('/remove/{id}', [CoursesController::class, 'removeFromCart'])->name('cart.remove');
            Route::get('/clear', [PaymentController::class, 'clear'])->name('cart.clear');
        });
        
    });

    Route::prefix('my-courses')->group(function () {
        Route::get('/', [CoursesController::class, 'myCourses'])->name('myCourses');
        Route::get('/{slug}', [CoursesController::class, 'startLearning'])->name('startLearning');
        Route::get('{noteSlug}/{courseSlug}', action: [CoursesController::class, 'viewLearning'])->name('note.viewLearning');

    });



    Route::prefix('payments')->group(function () {
        Route::get('/checkout', [PaymentController::class, 'showCheckout'])->name('payment.checkout');
    
        Route::get('/monnify/verify', [PaymentController::class, 'verifyMonnify'])->name('monnify.verify');
        Route::get('/paystack/verify', [PaymentController::class, 'paystackVerify'])->name('payment.verify');


    });
        

    Route::prefix('course-notes')->group(function () {
        
        Route::get('/{courseSlug}', [CourseNotesController::class, 'index'])->name('course.note.index');
        Route::get('create/{courseSlug}/{allocationSlug}', action: [CourseNotesController::class, 'create'])->name('note.create');
        Route::post('store', [CourseNotesController::class, 'store'])->name('note.store');
        Route::get('show/{slug}', [CourseNotesController::class, 'show'])->name('course.note.show');
        Route::get('edit/{slug}', [CourseNotesController::class, 'edit'])->name('course.note.edit');
        Route::post('update/{slug}', [CourseNotesController::class, 'update'])->name('course.note.update');
        Route::get('delete/{slug}', [CourseNotesController::class, 'destroy'])->name('course.note.delete');

        Route::prefix('materials')->group(function () {
            Route::get('delete/{slug}', [CourseNotesController::class, 'destroyNote'])->name('material.delete');
        });

        Route::post('/note/{slug}/complete', [CoursesController::class, 'markCompleted'])->name('note.complete');
        Route::post('/course/{slug}/reset-progress', [CoursesController::class, 'resetProgress'])->name('course.resetProgress');

    });


    Route::prefix('course-allocations')->group(function () {
        Route::get('/', [CourseAllocationController::class, 'index'])->name('allocation.index');
        Route::post('/create', [CourseAllocationController::class, 'store'])->name('allocation.store');
        Route::get('/view/{slug}', [CourseAllocationController::class, 'show'])->name('allocation.view');
        Route::post('/update/{slug}', [CourseAllocationController::class, 'update'])->name('allocation.update');
        Route::get('/delete/{slug}', [CourseAllocationController::class, 'destroy'])->name('allocation.delete');
    });

    Route::group(["prefix" => "FAQ"], function () {
        Route::get("/", [FaqController::class, 'index'])->name("faq.index");
        Route::post("/store", [FaqController::class, 'store'])->name("faq.store");
        Route::post("/update/{slug}", [FaqController::class, 'update'])->name("faq.update");
        Route::get("/delete/{slug}", [FaqController::class, 'destroy'])->name("faq.delete");
    });

    Route::group(["prefix" => "Blog"], function () {
        Route::get("/", [BlogController::class, 'index'])->name("blog.index");
        Route::get("/create", [BlogController::class, 'create'])->name("blog.create");
        Route::get("/show/{slug}", [BlogController::class, 'show'])->name("blog.show");
        Route::post("/store", [BlogController::class, 'store'])->name("blog.store");
        Route::post("/update/{slug}", [BlogController::class, 'update'])->name("blog.update");
        Route::get("/delete/{slug}", [BlogController::class, 'destroy'])->name("blog.delete");
    });
    Route::get('/signout', [HomeController::class, 'logout'])->name('signout');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
