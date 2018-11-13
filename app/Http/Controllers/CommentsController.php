<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'commentSave']]);
    }

    public function store(Post $post){
        if(session('comment')){
            $comment = Comment::create([
                'body' => session('comment'),
                'post_id'  => $post->id,
                'user_id' => auth()->user()->id
            ]);
            session(['comment' => null]);
            return redirect("posts/$post->id")->with('success', 'Add comment succeeded');
        }
        return redirect("posts/$post->id");         
    }

    public function commentSave(Request $request){
        // $request->session()
        // dd(\URL::previous());
        $url = \URL::previous();
        session(['comment' => $request->input('body')]);
        // session(['url' => $url]);
        // \Session::save();
        // dd(session('comment'));
        return redirect("$url/comments");
    }    
}
