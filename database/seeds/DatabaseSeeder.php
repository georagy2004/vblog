<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        factory(App\User::class, 5)->create();
        factory(App\Post::class, 20)->create();
        factory(App\Comment::class, 30)->create();
        factory(App\Tag::class, 8)->create();



        // $users->each(function($users){
        //     $users->posts()
        //           ->saveMany(factory(App\Post::class, 3)
        //           ->make(['user_id' => mt_rand(1, 5)]));
        // });
            //mt_rand(0, 5) Each user has 0-5 comments.      

        // for($i=0; $i<25; $i++){
        //     factory(App\Comment::class)->create([
        //         'user_id' => mt_rand(1, 5),
        //         'post_id' => mt_rand(1, 5),
        //     ]);
        // };
    }
}
