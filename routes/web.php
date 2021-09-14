<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FillInformationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\UserAPIController;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        $id = auth()->id();
        $avatar = UserInformation::where('id', $id)->first()->avatar;
        $name = User::where('id', $id)->first()->name;
        return view('index', ['name' => $name, 'avatar' => $avatar]);
    }
    return view('index');
});

Route::prefix('/api')->middleware('auth')->group(function () {
    Route::get('/information', [UserAPIController::class, 'getInfomation']);
    Route::get('/notice', [NotificationController::class, 'notice']);
    Route::get('/users', [UserAPIController::class, 'searchInfor']);
    Route::get('/followers', [RelationshipController::class, 'navFollow']);
    Route::get('/suggestions', [RelationshipController::class, 'navSuggest']);
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::post('/set_likes', [PostController::class, 'set_likes']);
    Route::resource('/set-followers', RelationshipController::class);
    Route::resource('/blogs', BlogController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/blogs', function () {
        $id = auth()->id();
        $avatar = UserInformation::where('id', $id)->first()->avatar;
        $name = User::where('id', $id)->first()->name;
        return view('blog', ['name' => $name, 'avatar' => $avatar]);
    })->name('blogs');
    Route::resource('/posts', PostController::class);
    Route::get('/test', function () {
        if (auth()->check()) {
            $id = auth()->id();
            $avatar = UserInformation::where('id', $id)->first()->avatar;
            $name = User::where('id', $id)->first()->name;
            return view('frontend', ['name' => $name, 'avatar' => $avatar]);
        }
        return view('frontend');
    });
    Route::get('/add-blog', function () {

        $id = auth()->id();
        $avatar = UserInformation::where('id', $id)->first()->avatar;
        $name = User::where('id', $id)->first()->name;
        return view('add-blog', ['name' => $name, 'avatar' => $avatar]);
    })->name('add-blog');
    Route::get('/suggestions', [UserAPIController::class, 'suggestions'])->name('suggestions');

    Route::get('/blogs/{id}', [BlogController::class, 'show']);

    Route::get('/information/user', function () {
        return view('information-user');
    });



    Route::get('/myprofile', [ProfileController::class, 'show'])->name('show-profile');
    Route::post('/update-profile', [ProfileController::class, 'update'])->name('update-profile');
    Route::get('/profile/{id}', [ProfileController::class, 'profile_users'])->name('show-profile_users');
});
Route::get('/fill-information', [FillInformationController::class, 'index'])->name('fill-information');
Route::post('/fill-finish', [FillInformationController::class, 'setInfor'])->name('fill-finish');
