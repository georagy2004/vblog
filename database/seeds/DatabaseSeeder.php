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
        
        $users = factory(App\User::class, 5)->create();
        $users->each(function($users){
            $users->posts()
                  ->saveMany(factory(App\Post::class, 3)
                  ->make(['user_id' => mt_rand(1, 5)]));
        });
            //mt_rand(0, 5) Each user has 0-5 comments.      
            // $users->comments()
            //       ->saveMany(factory(App\Comment::class, mt_rand(0,5))
            //       ->make([]));
        for($i=0; $i<25; $i++){
            factory(App\Comment::class)->create([
                'user_id' => mt_rand(1, 5),
                'post_id' => mt_rand(1, 5),
            ]);
        };


        // $user = factory(App\User::class, 5)->create();
        // $user->each(function($user){
        //     $user->posts()
        //     ->saveMany(factory(App\Post::class,  2))
        //     ->create()->each(function(App\Post $post){
        //           factory(App\Comment::class, 5)->create([
        //               'user_id' => mt_rand(1, 5),
        //               ]);
        //     });
        // });
        

        //$comments = factory(App\Comment::class, 20)->create();
        
        // $comments = factory(Comment::class, mt_rand(0,3))->make();
        // for ($i=0; $i < $comments->count(); $i++) { 
        //     $users->comments()->save($comments[$i]);
        // }
    }
}
