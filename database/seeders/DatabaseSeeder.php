<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Report;
use GuzzleHttp\Promise\Create;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        User::create([
            'name' => "Julius Adrian",
            'username' => "juliusadrian",
            'email' => "juliusa369@gmail.com",
            'password' => bcrypt("hai")
        ]);

        Category::create([
            'name' => "Web Programming",
            'slug' => "web-programming",
        ]);

        Category::create([
            'name' => "Web Design",
            'slug' => "web-design",
        ]);

        Category::create([
            'name' => "Personal",
            'slug' => "personal",
        ]);

        Post::factory(20)->create();

        Report::factory(20)->create();

        // Post::create([
        //     'title' => "Judul Pertama",
        //     'slug' => "judul-pertama",
        //     'excerpt' => " Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae odio architecto deserunt, voluptate sequi et distinctio neque quo quos necessitatibus possimus labore magnam fugiat praesentium molestias reprehenderit id itaque a in numquam voluptatum delectus est? A nesciunt ex iusto nam architecto culpa minima? Eum nesciunt magni cumque, facilis pariatur fugiat quasi?",
        //     'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae odio architecto deserunt, voluptate sequi et distinctio neque quo quos necessitatibus possimus labore magnam fugiat praesentium molestias reprehenderit id itaque a in numquam voluptatum delectus est? A nesciunt ex iusto nam architecto culpa minima? Eum nesciunt magni cumque, facilis pariatur fugiat quasi? Nemo debitis molestiae laboriosam fugiat assumenda nesciunt! Neque commodi ducimus error dicta fugit atque. Harum corporis ad ea? Beatae inventore, explicabo harum ducimus, architecto asperiores, at maxime quaerat veritatis sit itaque? Nobis alias quasi ad cum, odit dolorem reiciendis obcaecati porro nostrum culpa ab illo laudantium, iure ullam dolor.",
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => "Judul Kedua",
        //     'slug' => "judul-kedua",
        //     'excerpt' => " Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae odio architecto deserunt, voluptate sequi et distinctio neque quo quos necessitatibus possimus labore magnam fugiat praesentium molestias reprehenderit id itaque a in numquam voluptatum delectus est? A nesciunt ex iusto nam architecto culpa minima? Eum nesciunt magni cumque, facilis pariatur fugiat quasi?",
        //     'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae odio architecto deserunt, voluptate sequi et distinctio neque quo quos necessitatibus possimus labore magnam fugiat praesentium molestias reprehenderit id itaque a in numquam voluptatum delectus est? A nesciunt ex iusto nam architecto culpa minima? Eum nesciunt magni cumque, facilis pariatur fugiat quasi? Nemo debitis molestiae laboriosam fugiat assumenda nesciunt! Neque commodi ducimus error dicta fugit atque. Harum corporis ad ea? Beatae inventore, explicabo harum ducimus, architecto asperiores, at maxime quaerat veritatis sit itaque? Nobis alias quasi ad cum, odit dolorem reiciendis obcaecati porro nostrum culpa ab illo laudantium, iure ullam dolor.",
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => "Judul Ketiga",
        //     'slug' => "judul-ketiga",
        //     'excerpt' => " Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae odio architecto deserunt, voluptate sequi et distinctio neque quo quos necessitatibus possimus labore magnam fugiat praesentium molestias reprehenderit id itaque a in numquam voluptatum delectus est? A nesciunt ex iusto nam architecto culpa minima? Eum nesciunt magni cumque, facilis pariatur fugiat quasi?",
        //     'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae odio architecto deserunt, voluptate sequi et distinctio neque quo quos necessitatibus possimus labore magnam fugiat praesentium molestias reprehenderit id itaque a in numquam voluptatum delectus est? A nesciunt ex iusto nam architecto culpa minima? Eum nesciunt magni cumque, facilis pariatur fugiat quasi? Nemo debitis molestiae laboriosam fugiat assumenda nesciunt! Neque commodi ducimus error dicta fugit atque. Harum corporis ad ea? Beatae inventore, explicabo harum ducimus, architecto asperiores, at maxime quaerat veritatis sit itaque? Nobis alias quasi ad cum, odit dolorem reiciendis obcaecati porro nostrum culpa ab illo laudantium, iure ullam dolor.",
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => "Judul Keempat",
        //     'slug' => "judul-keempat",
        //     'excerpt' => " Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae odio architecto deserunt, voluptate sequi et distinctio neque quo quos necessitatibus possimus labore magnam fugiat praesentium molestias reprehenderit id itaque a in numquam voluptatum delectus est? A nesciunt ex iusto nam architecto culpa minima? Eum nesciunt magni cumque, facilis pariatur fugiat quasi?",
        //     'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae odio architecto deserunt, voluptate sequi et distinctio neque quo quos necessitatibus possimus labore magnam fugiat praesentium molestias reprehenderit id itaque a in numquam voluptatum delectus est? A nesciunt ex iusto nam architecto culpa minima? Eum nesciunt magni cumque, facilis pariatur fugiat quasi? Nemo debitis molestiae laboriosam fugiat assumenda nesciunt! Neque commodi ducimus error dicta fugit atque. Harum corporis ad ea? Beatae inventore, explicabo harum ducimus, architecto asperiores, at maxime quaerat veritatis sit itaque? Nobis alias quasi ad cum, odit dolorem reiciendis obcaecati porro nostrum culpa ab illo laudantium, iure ullam dolor.",
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
