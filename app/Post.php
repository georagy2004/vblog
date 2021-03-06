<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table Name
    protected $table = 'posts';
    //Primary Key
    protected $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
    