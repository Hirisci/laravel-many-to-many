<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) { 
            $post = new Post();
            $post->title = $faker->sentence(4);
            $post->content = $faker->paragraph();
            $post->is_public = rand(0,1);
            $post->save();
        }
    }
}
