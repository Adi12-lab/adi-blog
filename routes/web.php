<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;//namespace jangan lupa
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Models\User;
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
    return view("home", [
    "title" => "Home",
    "active" => "Home"]);
});
Route::get("/register", [RegisterController::class, "index"])->middleware("guest");
Route::post("/register", [RegisterController::class, "store"]);

Route::get("/login", [LoginController::class, "index"])->middleware("guest")->name("login");//halaman login hanya dapat diakses oleh orang yang belum login, ->name(login) adalah memberi nama, kalo route ini adalah route login
Route::post("/login", [LoginController::class, "authenticate"]);

Route::get("/dashboard", [DashboardController::class, "index"])->middleware("auth");
Route::get("/dashboard/posts/createSlug", [DashboardPostController::class, "createSlug"]);
Route::resource("/dashboard/posts", DashboardPostController::class)->middleware("auth");

Route::post("/logout", [LoginController::class, "logout"]);
Route::get("/posts", [PostController::class, "index"]);
// Route::get('/posts', function () {
//     return view("posts", [
//     "title" => "Posts",
//     "posts" => Post::all()]);
// });

//single post
Route::get("/post/{post:slug}", [PostController::class, "show"]);
//Route::get("/post/{id}", [PostController::class, "show"]);
// Route::get("/post/{slug}", function($slug) {
   
// // $new_post = [];
// // foreach($blog_posts as $post) {
// //   if($post["slug"] == $slug) $new_post = $post;
// // }
//   // return view("post", [
//   //   "title" => Post::find($slug)["slug"],
//   //   "post" => Post::find($slug)]);
  
// });
Route::get("/categories", [CategoryController::class, "index"]);
// Route::get("/categories/{category:slug}",[CategoryController::class, "show"]);
// Route::get("/author/{author:username}", function (User $author) {
//     return view("posts", [
//       "active" => "Author",
//       "title" => "Post by Author : ". $author->name,
//       "posts" => $author->posts->load("author", "category")//saat posts didapatkan, posts dilooping menjadi post, nah tiap post itu memanggil authornya berserta kategorinya, untuk itu diperlukanlah load author sekaligus categorinya
//       ]);
// });
Route::get('/about', function () {
    return view("about", [
    "title" => "About",
    "active" => "About",
    "nama" => "Ahmad Adi Iskandar",
    "umur" => 20,
    "image" => "adi.jpg"
    ]);
    
});
