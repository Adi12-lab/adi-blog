<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index (Category $category) {
     return view("categories",[
      "active" => "Categories",
      "title" => "Categories",
      "categories" => Category::all()
      ]);
  
  }
  public function show (Category $category) {
  
   return view("posts", [
    "active" => "Categories",
    "title" => "Posts by Category : ". $category->name,
    "posts" => $category->posts->load("author", "category"),
    //kenapa menggunakkan load, bukan with ?, karena data posts yang berdasarkan kategori ini didapatkan setelah kita query parent kelas Category
    ]);
  }
}
