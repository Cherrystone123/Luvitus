<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//controller
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PostController;

//model
use App\Models\Posts;
use App\Models\Image;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('auth/google', [GoogleController::class, 'signInwithGoogle']);
Route::get('callback/google', [GoogleController::class, 'callbackToGoogle']);
Route::get('/', function () {
    $posts = Posts::all();
    $images = Image::select('post_id', 'photo')
                 ->distinct('post_id')
                 ->get();
    return view('welcome',compact('posts','images'));
});

Route::get('guest/posts/{id}',[PostController::class, 'guestShow']);
//category
Route::get('guest/category',[PostController::class, 'guestCategory'])->name('guestCategory');
Route::get('guest/category/{id}',[PostController::class, 'guestCategoryShow']);
Route::get('img/{id}',[PostController::class,'img']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $posts = Posts::all();
        $images = Image::select('post_id', 'photo')
                 ->distinct('post_id')
                 ->get();
        if (Auth::user() -> email == env('ADMIN')) {
            return view('admin',compact('posts','images'));
        }else{
            return view('dashboard',compact('posts','images'));
        }
    })->name('dashboard');
    // admin/create routeName
    Route::get('admin/create',[PostController::class, 'create'])->name('admin/create');
    Route::post('admin/store',[PostController::class, 'store'])->name('admin/store');
    // admin/edit/2
    Route::get('admin/edit/{id}',[PostController::class, 'edit']);
    Route::post('admin/update/{id}',[PostController::class, 'update']);
    // admin/delete/2
    Route::delete('admin/destroy/{id}', [PostController::class, 'destroy']);
    Route::get('posts/{id}',[PostController::class, 'show']);
    //category
    Route::get('category',[PostController::class, 'category'])->name('category');
    Route::get('category/{id}',[PostController::class, 'categoryShow']);

});
