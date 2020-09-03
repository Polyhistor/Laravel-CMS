<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->each(function ($user) {
            $user->posts()->save(factory(Post::class)->make());
        });
    }
}
