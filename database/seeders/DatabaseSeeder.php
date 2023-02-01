<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {
    User::factory(4)->create();
    Category::create([
      "name" => "Programming",
      "slug" => "programming"
    ]);
    Category::create([
      "name" => "Web Design",
      "slug" => "web-design"
    ]);
    Category::create([
      "name" => "Personal",
      "slug" => "personal"
    ]);
    Post::factory(20)->create();
  }
}