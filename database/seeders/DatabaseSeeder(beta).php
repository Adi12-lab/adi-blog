<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run() {
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
    User::create([
      "name" => "Ahmad Adi Iskandar",
      "email" => "adiiskandarubaidah@gmail.com",
      "password" => bcrypt("oranggokil")
    ]);
    User::create([
      "name" => "Sepak Bola",
      "email" => "sepakbola088@gmail.com",
      "password" => bcrypt("123")
    ]);
    
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
      
    Post::create([
      "title" => "Judul Pertama",
      "slug" => "judul-pertama",
      "excerpt" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus quibusdam, soluta laborum earum ab rerum quaerat et nobis? Omnis quibusdam voluptates eos,",
      "body" => "<p>emrem ipsum dolor sit amet, consectetur adipisicing elit. Delectus quibusdam, soluta laborum earum ab rerum quaerat et nobis? Omnis quibusdam voluptates eos, eius similique, aspernatur vel excepturi ipsa ad mollitia soluta iusto, accusamus possimus necessitatibus.</p>
<p>eum nisi consequatur labore quidem cupiditate officia! Quos doloremque rem sapiente vero minima eaque earum, eos optio, temporibus non recusandae laborum necessitatibus labore atque ipsum, iste rerum commodi veniam. Dignissimos adipisci iure nisi, consequuntur ducimus harum, incidunt quasi, distinctio culpa aspernatur corporis dolore iusto, voluptas! Quasi ipsam suscipit veritatis facere incidunt commodi pariatur, tenetur, ut debitis eum eos nam sed, aut nemo cum praesentium minima asperiores beatae. Labore incidunt totam iusto repellat, quo odit repellendus voluptatibus porro mollitia iure nobis blanditiis error ipsam, in similique voluptates!</p>",
        "user_id" => 2,
        "category_id" => 1
    
    ]);
    Post::create([
      "title" => "Judul Kedua",
      "slug" => "judul-kedua",
      "excerpt" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus quibusdam, soluta laborum earum ab rerum quaerat et nobis? Omnis quibusdam voluptates eos,",
      "body" => "<p>emrem ipsum dolor sit amet, consectetur adipisicing elit. Delectus quibusdam, soluta laborum earum ab rerum quaerat et nobis? Omnis quibusdam voluptates eos, eius similique, aspernatur vel excepturi ipsa ad mollitia soluta iusto, accusamus possimus necessitatibus.</p>
<p>eum nisi consequatur labore quidem cupiditate officia! Quos doloremque rem sapiente vero minima eaque earum, eos optio, temporibus non recusandae laborum necessitatibus labore atque ipsum, iste rerum commodi veniam. Dignissimos adipisci iure nisi, consequuntur ducimus harum, incidunt quasi, distinctio culpa aspernatur corporis dolore iusto, voluptas! Quasi ipsam suscipit veritatis facere incidunt commodi pariatur, tenetur, ut debitis eum eos nam sed, aut nemo cum praesentium minima asperiores beatae. Labore incidunt totam iusto repellat, quo odit repellendus voluptatibus porro mollitia iure nobis blanditiis error ipsam, in similique voluptates!</p>",
        "user_id" => 1,
        "category_id" => 3 ]);
    Post::create([
      "title" => "Judul Ketiga",
      "slug" => "judul-ketiga",
      "excerpt" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus quibusdam, soluta laborum earum ab rerum quaerat et nobis? Omnis quibusdam voluptates eos,",
      "body" => "<p>emrem ipsum dolor sit amet, consectetur adipisicing elit. Delectus quibusdam, soluta laborum earum ab rerum quaerat et nobis? Omnis quibusdam voluptates eos, eius similique, aspernatur vel excepturi ipsa ad mollitia soluta iusto, accusamus possimus necessitatibus.</p>
<p>eum nisi consequatur labore quidem cupiditate officia! Quos doloremque rem sapiente vero minima eaque earum, eos optio, temporibus non recusandae laborum necessitatibus labore atque ipsum, iste rerum commodi veniam. Dignissimos adipisci iure nisi, consequuntur ducimus harum, incidunt quasi, distinctio culpa aspernatur corporis dolore iusto, voluptas! Quasi ipsam suscipit veritatis facere incidunt commodi pariatur, tenetur, ut debitis eum eos nam sed, aut nemo cum praesentium minima asperiores beatae. Labore incidunt totam iusto repellat, quo odit repellendus voluptatibus porro mollitia iure nobis blanditiis error ipsam, in similique voluptates!</p>",
        "user_id" => 1,
        "category_id" => 3 ]);
  }
}