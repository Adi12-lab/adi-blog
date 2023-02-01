<?php

namespace App\Http\Controllers;
use App\Models\Post;//jangan lupa
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
      $title = "";
      if (request("category")) {
        $category = Category::firstWhere("slug", request("category"))->name;
        $title = " in ".$category;
      } else if (request("author")) {
        $author = User::where("username", request("author"))->first()->name;
        $title = " by ".$author;
      }
       
      return view("posts", 
      [
      "active" => "Posts",
      "title" => "All Post".$title, 
      "posts" => Post::latest()->filter(request(["search","category", "author"]))->paginate(7)->withQueryString()
      ]);//with bisa dipindahkan jadi variabel di model
    }
    
    public function show(Post $post) {//Tanpa ada Post, maka yang dikirimkan cuman berupa slugnya saja, !! Post !!, merujuk pada kelas Post di line 4
    
      return view("post", [
      "active" => "Posts",
      "title" => $post->title,
      "post" => $post]);
      // "post" => Post::find($id)]);,//find, adalah method dari laravelnya
    }
}
//Post::create(["title" => "Judul Pertama", "category_id" => 1,"slug"=> "judul-pertama", "excerpt" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam provident optio mollitia minima aspernatur esse", "body" => " <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam provident optio mollitia minima aspernatur esse debitis voluptas necessitatibus dolore repellendus. Quia atque voluptatum aut eum, quam ipsa fugiat minus animi esse.</p><p>Aperiam nam, labore vero, nostrum laudantium dignissimos provident recusandae ducimus ipsam odio, reiciendis quaerat sit optio nemo incidunt soluta sequi consectetur suscipit cum sunt eos corporis. Labore sint quis, totam nemo nihil, dignissimos? Ducimus saepe, quibusdam in aliquam aspernatur labore non id dolor ipsa, fugiat minus unde hic eius maxime. Eveniet esse harum animi, perferendis totam consequatur velit rerum fugit facere. Quam laudantium modi, sequi perspiciatis totam ab qui dicta et quos, mollitia commodi magnam hic voluptatum quibusdam nostrum a corporis necessitatibus saepe quidem maiores consectetur? Non quam excepturi soluta amet ullam eum quas placeat labore corporis odit sunt dolorum, perferendis, laboriosam in ducimus praesentium iste sapiente modi quo? Iure ipsam harum earum, distinctio amet ex, a fugiat, ab inventore esse deleniti nemo animi, quos quidem? Quia accusamus dicta, est minima quaerat, veritatis incidunt dolorem quasi!</p>"]);
//