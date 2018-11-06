<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Post;


class TagsController extends Controller
{
    public function index(Tag $tag){
        

        // foreach($tag->posts as $post){
            
        // }

        // $posts = $tag->posts->paginate(10);
        // $posts = Post::where('id', $tags->pivot->post_id)->get();

        $posts = $tag->posts->paginate(1);
        // $posts = paginate(10);
        // dd($posts);
        return view('posts.index',compact('posts'));
    }
}
