<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->create()->each(function ($user) {
            $posts = Post::factory(3)->create(['user_id' => $user->id]);

            $posts->each(function ($post) use ($user) {
                $comments = Comment::factory(5)->create([
                   'user_id' => User::inRandomOrder()->first()->id,
                    'post_id' => $post->id,
                ]);

                $comments->each(function ($comment) use ($user) {
                    Reply::factory(rand(2, 5))->create([
                        'user_id' => User::inRandomOrder()->first()->id,
                        'comment_id' => $comment->id,
                    ]);
                });
            });
        });
    }
}
