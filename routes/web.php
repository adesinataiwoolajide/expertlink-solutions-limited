<?php

use App\Http\Controllers\{ProfileController, HomeController, UserController};
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

    Route::group(["prefix" => "Users"], function () {
       
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
