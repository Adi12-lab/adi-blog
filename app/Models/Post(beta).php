<?php

namespace App\Models;

class Post {
  private static $blog_posts = [
  ["title" => "Judul 1",
  "slug" => "judul-1",
  "author" => "Ahmad Adi",
  "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis officia, inventore tempore voluptatum itaque eveniet vitae. Hic cumque earum animi nisi rerum beatae, iure enim necessitatibus distinctio sapiente fuga, magnam sed, deserunt. Quos dolor exercitationem nisi nobis ipsum vero deserunt odio, velit, omnis minima maxime quidem quod corrupti quaerat esse accusantium, ut id atque hic reprehenderit neque, doloribus error! Nulla quae at adipisci, commodi, laborum recusandae ab atque consectetur, architecto ipsa repellat omnis! Accusantium quaerat minus ex nesciunt doloribus."
  ],
  ["title" => "Judul 2",
  "slug" => "judul-2",
  "author" => "Alfian Dwi",
  "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta excepturi quisquam quaerat eos placeat consequuntur, expedita corporis optio aliquid, explicabo ut saepe in ullam, quasi. Praesentium ea in eos qui iure fuga error magnam fugit enim quibusdam at ex unde tenetur nulla, quis repellendus beatae deserunt, voluptatum sit, suscipit, aliquid ducimus nam facilis voluptate officiis. Eius exercitationem magni, pariatur modi nemo, perferendis asperiores nesciunt. Quidem voluptatibus, optio enim quae saepe fugiat nemo error impedit, ut dolore laborum tenetur vel architecto, accusamus obcaecati perspiciatis id dolorem nihil."
  ]
  
];
  public static function all() {
    return collect(self::$blog_posts);//sakti
  }
  public static function find($slug) {
    // $new_post = [];
    // foreach (self::$blog_posts as $post) {
    //   if ($post["slug"] === $slug) $new_post = $post;
    // }
    // return $new_post;
    $post = static::all();//kalo properti pakek self, kalo fungsi pakek static
    return $post->firstWhere("slug", $slug);
  }
}