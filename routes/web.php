<?php

use Illuminate\Support\Facades\Route;

// Controllers for the regular users
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;

// COntrollers for the admin users
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\CategoriesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('index');

    // Route to open create post page
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

    //Route forInserting/Storing the posts details into post table
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/show', [PostController::class, 'show'])->name('post.show');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');

    // Route for Comment
    // Route for storing Comment
    Route::post('/comment/{post_id}/store',[CommentController::class, 'store'])->name('comment.store');

    // Route for destroying/deleting the comment
    Route::delete('/comment/{id}/destroy', [CommentController::class, 'destroy'])->name('comment.destroy');

    // Profile Routes
    Route::get('/profile/{id}/show', [ProfileController::class, 'show'])->name('profile.show');

    // This route is use for opening the edit profile page
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // This route si use for updating user data
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Route for Likes
    Route::post('/like/{post_id}/store', [LikeController::class, 'store'])->name('like.store');
    Route::delete('/like/{post_id}/destroy', [LikeController::class, 'destroy'])->name('like.destroy');

    // Route for follow/unfollow
    Route::post('/follow/{user_id}/store', [FollowController::class, 'store'])->name('follow.store');
    Route::delete('/follow/{user_id}/destroy',[FollowController::class, 'destroy'] )->name('follow.destroy');

    Route::get('/profile/{id}/followers', [ProfileController::class, 'followers'])->name('profile.followers');
    Route::get('/profile/{id}/following', [ProfileController::class, 'following'])->name('profile.following');
    /* Route::get('/profile/{id}/userslist', [ProfileController::class, 'userslist'])->name('profile.userslist'); */
    Route::get('/profile/allusers', [ProfileController::class, 'showAllUsers'])->name('allusers');

    //Admin Section
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){
        # Users admin route
        Route::get('/users', [UserController::class, 'Index'])->name('users'); // admin.users
        Route::delete('/users/{id}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate'); // admin.users.deactivate
        Route::patch('/users/{id}/activate', [UserController::class, 'activate'])->name('users.activate'); // admin.users.activate
        
        # Posts admin route
        Route::get('/posts', [PostsController::class, 'index'])->name('posts'); // admin.posts
        Route::delete('/posts/{id}/hide', [PostsController::class, 'hide'])->name('posts.hide');
        Route::patch('/posts/{id}/unhide', [PostsController::class, 'unhide'])->name('posts.unhide');

        # Categories admin route
        Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
        Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
        Route::patch('categories/{id}/update', [CategoriesController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{id}/destroy', [CategoriesController::class, 'destroy'])->name('categories.destroy');
    });

    Route::get('/people', [HomeController::class, 'search'])->name('search');
});
