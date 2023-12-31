<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Article::factory()->count(20)->create();
        Comment::factory()->count(40)->create();

        $list = ['News', 'Tech', 'Mobile', 'Web', 'Desktop'];
        foreach($list as $name) {
            \App\Models\Category::create(['name'=>$name]);
        }

        User::factory()->create([
            "name" => "Alice",
            "email" => "alice@gmail.com",
        ]);

        User::factory()->create([
            "name" => "Bob",
            "email" => "bob@gmail.com",
        ]);
    }
}
