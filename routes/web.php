<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;


Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/home', function () {return redirect()->route('home');});

Route::get('/about',[SiteController::class, 'about'])->name('about');
Route::get('/course',[SiteController::class, 'course'])->name('course');
Route::get('/detail',[SiteController::class, 'detail'])->name('pages.detail');
Route::get('/feature',[SiteController::class, 'feature'])->name('pages.feature');
Route::get('/team',[SiteController::class, 'team'])->name('pages.team');
Route::get('/testimonial',[SiteController::class, 'testimonial'])->name('pages.testimonial');
Route::get('/contact',[SiteController::class, 'contact'])->name('contact');



Route::middleware(['auth','admin','verified'])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/demo', [SiteController::class, 'demo_create']);
    Route::post('/demo', [SiteController::class, 'demo_store']);
        

    Route::get('/blog', [AdminController::class, 'create'])->name('blog.create');
    Route::post('/blog', [AdminController::class, 'store'])->name('blog.store');

    
    Route::get('/course-create', [AdminController::class, 'course_create'])->name('course.create');
    Route::post('/course-create', [AdminController::class, 'course_store'])->name('course.store');

    Route::get('/tag', [AdminController::class, 'tag_create'])->name('tag.create');
    Route::post('/tag', [AdminController::class, 'tag_store'])->name('tag.store');

    Route::get('/instructor', [AdminController::class, 'instructor_create'])->name('instructor.create');
    Route::post('/instructor', [AdminController::class, 'instructor_store'])->name('instructor.store');


    
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['auth','admin'])->group(function(){});

require __DIR__.'/auth.php';