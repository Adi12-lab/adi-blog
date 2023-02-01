<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $posts = Post::where("user_id", auth()->user()->id)->get();
    return view("dashboard/posts/index", [
      "posts" => $posts
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    return view("dashboard.posts.create", [
      "categories" => Category::all()
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
  $request->file("image")->store("image");
    $validated = $request->validate([
      "title" => "required|max:225",
      "slug" => "required|max:225|unique:posts",
      "category_id" => "required",
      "body" => "required"
    ]);
    $validated["user_id"] = auth()->user()->id;
    $validated["excerpt"] = Str::limit(strip_tags($validated["body"]), 100);
    Post::create($validated);
    return redirect("/dashboard/posts")->with("succes", "Your new Post has been added");
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function show(Post $post) {
    return view("dashboard.posts.show", [
      "post" => $post
    ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function edit(Post $post) {
    return view("dashboard.posts.edit", [
      "post" => $post,
      "categories" => Category::all()
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Post $post) {
    $rules = [
      "title" => "required|max:225",
      "category_id" => "required",
      "body" => "required"
    ];
    //dicek terlebih dahulu, apabila slug baru maka berlaku rules dibawah ini, jika tidak, maka tidak ada rules
    if ($request->slug != $post->slug) {
      $rules["slug"] = "required|unique:posts";
    }
    $validated = $request->validate($rules);
    
    $validated["user_id"] = auth()->user()->id;
    $validated["excerpt"] = Str::limit(strip_tags($validated["body"]), 100);
    Post::where("id", $post->id)->update($validated);
    
    return redirect("/dashboard/posts")->with("succes", "Your Post has been updated !"); 

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function destroy(Post $post) {
    Post::destroy($post->id);
    return redirect("/dashboard/posts")->with("succes", "The post has been deleted");
  }

  public function createSlug(Request $request) {
    $slug = SlugService::createSlug(Post::class, 'slug', $request->title, ['unique' => true]);
    return response()->json(["slug" => $slug]);
  }
}